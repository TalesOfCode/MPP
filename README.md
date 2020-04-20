# My Project's Platform

A symfony back project for a web platform.

# Slack

A slack has open ! You can there contact the team members and also follow news about the project. There is also channels about the other projects of this team. Ask me to add you to slack with your email at cabbadie.pro@gmail.com.

# Project local setup

First, install symfony with the following instructions : https://symfony.com/doc/current/setup.html

Then, run composer install for installing all dependencies.

After that, you need to setup a mysql DB on your computer : https://dev.mysql.com/doc/mysql-apt-repo-quick-guide/en/#apt-repo-fresh-install

When your db works, You can install in your apache server an IHM for administrate it.
Personnaly, I like adminer because it's simple to install and configure.
Check the official site for changing the default theming.

## Adminer install by command line (latest version)
```Batchfile
sudo mkdir /usr/share/adminer
sudo wget "http://www.adminer.org/latest.php" -O /usr/share/adminer/latest.php
sudo ln -s /usr/share/adminer/latest.php /usr/share/adminer/adminer.php
echo "Alias /adminer.php /usr/share/adminer/adminer.php" | sudo tee /etc/apache2/conf-available/adminer.conf
sudo a2enconf adminer.conf
sudo service apache2 restart
```

## Adminer setup
Just go to http://localhost/adminer.php and connect to your database

# Doctrine setup

Go to MPP/config/packages/doctrine.yaml and setup the config under dbal with the following:
```YAML
dbname: <name of your local database>
server_version: <version of your SGBD>
user: <Connection user>
password: <User password>
driver: <pdo_mysql if you use mysql db>
```

Then, run this to setup database:
```Batchfile
php bin/console doctrine:migration:migrate
```

It will update DB with the latest migration file found in capro-back/src/Migrations
