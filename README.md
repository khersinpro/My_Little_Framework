# My_Little_Framework

*** Initialisation du projet ***

P1 => Clonner le repertoire, git clone https://github.com/khersinpro/My_Little_Framework.git
P2 => Installation des dépendences, composer install
P3 => Renommer le fichier .example.env en .env et ajouter les informations pour connecter la base de donnée
P4 => cd public, php -S localhost:'port'

*** Ajout de controller***

Création d'un controller et ajout dans les modules pris en compte de l'application:

    => Création du controller dans src/Controller
    
    => Le controller doit extends de AbstractController, doit appeler son constructeur et lui passer le Container en param
    
    => Dans public/index.php, ajouter le namespace du controller dans le tableau $modules

*** Ajout de class dans le Injection de dépendences ***

    => Le container de dépendence est gérer par le package PHP/DI
    
    => Le fichier de config se trouve dans src/Framework/DependencyInjection/di_config.php
    
    => Ajouter les class conformement a la doc de PHP/DI
    
    => doc: 

*** Gestion des Entity et des migrations en BDD ***

Créer une Entity

    => https://www.doctrine-project.org/projects/doctrine-orm/en/2.14/tutorials/getting-started.html#starting-with-the-product-entity
    
Créer un repository et lié l'entité

    => Créer le repository dans le dossier Repository, il doit extend de Doctrine\ORM\EntityRepository
    
    => Créer le contructeur comme ci-dessous:
        public function __construct(EntityManagerInterface $em)
        {
            parent::__construct($em, new ClassMetadata("Entity"::class));
        }
        
    => dans l'entity a lié, au dessus de la déclaration de class, ajouter :
        #[ORM\Entity(repositoryClass: Repository::class)]  
        
    => doc: https://www.doctrine-project.org/projects/doctrine-orm/en/2.14/tutorials/getting-started.html#entity-repositories
    
Aprés ajout/modification des entities, création d'une migration en base de donnée:

    => doc: https://www.doctrine-project.org/projects/doctrine-migrations/en/3.5/reference/generating-migrations.html#generating-migrations
    
    => Génére une migrations en rapport avec les modifications: ./vendor/bin/doctrine-migrations diff
    
    => Envoie la migration en BDD: ./vendor/bin/doctrine-migrations migrate
    
