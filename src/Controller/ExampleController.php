<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Framework\Controller\AbstractController;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;

class ExampleController extends AbstractController
{
    /**
     * Constructeur qui prend le ContainerInterface afin de configuré l'abstractController qui detiens les outils de bases pour un controller
     * @param ContainerInterface Container afin d'injecter les methods utile a un controller
     */
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->addRoute('/', [$this, 'index'], 'blog', ['GET']);
        $this->addRoute('/example/[slug:slug]/[digit:id]/[text:text]', [$this, 'show'], 'blog.show', ['POST', 'GET']);
    }
    
    public function index(ServerRequestInterface $request)
    {
        $repo = new UserRepository($this->getEntityManager());
        
        return $this->render('/example/index.html.twig', [
            "title" => "Bienvenue sur mon framework",
        ]);
    }

    public function show(ServerRequestInterface $request)
    {
        list($slug, $id, $text)= array_values($request->getQueryParams());
        
        return $this->render('/example/show.html.twig', [
            'slug'=> $slug,
            'id' => $id,
            'text' => $text
        ]);
    }
}
