<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CustomerManagerController extends AbstractController
{
    /**
     * @Route("/customer-manager/{customerID}", name="customerManager")
     */
    public function index()
    {
        return $this->render('customer_manager/index.html.twig', [
            'controller_name' => 'CustomerManagerController',
        ]);
    }
}
