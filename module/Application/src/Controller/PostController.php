<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Post;

class PostController extends AbstractActionController 
{
    /**
     * @var Doctrine\ORM\EntityManager 
     */
    private $entityManager;

    public function __construct($entityManager) 
    {
        $this->entityManager = $entityManager;
    }

    public function IndexAction()
    {
        $posts = $this->entityManager->getRepository(Post::class)
            ->findAll();
        return new ViewModel([
            "posts" => $posts
        ]);
    }
    
    public function ShowAction()
    {
        $id = $this->params()->fromRoute('id');
        $post = $this->entityManager->getRepository(Post::class)
            ->find($id);
        
        return new ViewModel([
            'post' => $post
        ]);
    }   
}