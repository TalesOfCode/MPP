<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Project;

class MainController extends AbstractController
{
    /**
     * @Route("/init", name="init")
     */
    public function init(Request $req){
        $nbProjects = count($this->getDoctrine()->getRepository(Project::class)->findAll());
        $message = $nbProjects>0 ? "There is already $nbProjects project(s). Initialization cancelled." : "Initialization successfull";
        $rc = $nbProjects>0 ? 403 : 200;
        
        if ($nbProjects==0) {
            $em = $this->getDoctrine()->getManager();

            $project = new Project();
            $project->setName("CAProjects");
            $project->setDescription("This big project that show you all my work !");
            $project->setCreation(new \DateTime());
            $project->setType("webApp");
            $project->setAvailable(true);

            $em->persist($project);

            $em->flush();
        }

        return $this->json(['message' => $message], $rc);
    }

    /**
     * @Route("/", name="no")
     */
    public function no(){
        return $this->json(['message' => 'Nothing to say...'], 404);
    }
}
