<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="Dashboard")
     * 
     * This is the home page / dashboard page
     * 
     */
    public function index()
    {
        // Render view from TWIG template
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
