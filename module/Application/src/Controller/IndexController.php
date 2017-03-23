<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Post;

class IndexController extends AbstractActionController
{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function __construct($entityManager) 
    {
        $this->entityManager = $entityManager;
    }
    
    public function indexAction()
    {
        $posts = $this->entityManager->getRepository(Post::class)
            ->findAll();
        return new ViewModel([
            "posts" => $posts
        ]);
    }
}
