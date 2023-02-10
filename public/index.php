<?php

use App\Controller\ExampleController;
use Framework\App;
use Framework\DependencyInjection\ContainerFactory;
use GuzzleHttp\Psr7\ServerRequest;
use function Http\Response\send;

require '../vendor/autoload.php';

// Ajout des controller pris en compte par l'application ici
$modules = [
    ExampleController::class
];

// Création du container d'inction
$container = call_user_func(new ContainerFactory());

// Création de l'app avec le container et les modules a utiliser
$app = new App($container, $modules);

// Passage de la request via le package guzzlehttp => app return la response
$response = $app->run(ServerRequest::fromGlobals());

// Envoie de la réponse
send($response);
