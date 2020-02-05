<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Project;
use Symfony\Component\Serializer\SerializerInterface;

class ProjectController extends AbstractController
{
    /**
     * @Route("/project/{id<\d+>}", name="project")
     */
    public function project(int $id, SerializerInterface $si) 
    {
        $data = "Project not found with ID = $id";
        $rc = 403;

        $proj = $this->getDoctrine()->getRepository(Project::class)->findOneBy(['id' => $id]);

        if($proj) {
            $data = $proj;
            $rc = 200;
        }

        return $this->json(['project' => $data], $rc);
    }
}
