<?php

namespace App\Controller;

use App\Entity\Customer;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

class CustomerManagerController extends AbstractController
{
    /**
     * @Route("/customer/{customerID}", name="showCustomer")
     */
    public function show($customerID)
    {
        $customer = $this->getDoctrine()
            ->getRepository(Customer::class)
            ->find($customerID);

        if (!$customer) {
            throw $this->createNotFoundException(
                'No product found for id ' . $customerID
            );
        }

        return new Response('Check out this great customer ' . $customer->getFullName());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }

    /**
     * @Route("/customer-manager/add-customer", name="addCustomer",  methods={"POST"})
     */
    public function createCustomer(): Response
    {
        $request = Request::createFromGlobals();

        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createCustomer(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $customer = new Customer();
        $customer->setFullName( $request->get('customerFullName') );
        $customer->setEMail( $request->get('customerPhone') );
        $customer->setPhone( $request->get('customerEmail') );
        $customer->setEid( $request->get('customerExternalId') );
        
        $objDateTime = new DateTime('NOW');
        $customer->setDateCreated($objDateTime);
        $customer->setDateModified($objDateTime);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($customer);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id ' . $customer->getId());

    }
    /**
     * @Route("/customer-manager/new-customer", name="newCustomer" )
     */
    public function newCustomer()
    {
        return $this->render('customer_manager/newCustomer.html.twig', [
            'controller_name' => 'CustomerManagerController',
        ]);
    }
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
