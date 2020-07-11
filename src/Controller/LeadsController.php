<?php

namespace App\Controller;

use App\Entity\Leads;
use App\Form\NewLeadsType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class LeadsController extends AbstractController
{
    /**
     * @Route("/leads/viewAll", name="viewAllLeads")
     */
    public function viewCustomers()
    {
        $repository = $this->getDoctrine()
                        ->getRepository(Leads::class);
        $leads = $repository->findAll();

        return $this->render('leads/viewAllLeads.html.twig', [
            'leads' => $leads,
        ]);
    }
    /**
     * @Route("/leads/add", name="addLead")
     */
    public function addLead()
    {
        // Get POST information sent
        $request = Request::createFromGlobals();
        // Start a new customer object
        $lead = new Leads();
        // Create a new form object and bound to customer class
        $formNewLead = $this->createForm(NewLeadsType::class, $lead);

         // Attach POST request data to customer class
         $formNewLead->handleRequest($request);
 
         // Check that the form validates
         if ($formNewLead->isSubmitted() && $formNewLead->isValid()) {
             // $form->getData() holds the submitted values
             // but, the original `$task` variable has also been updated
             $newLead = $formNewLead->getData();
 
             // you can fetch the EntityManager via $this->getDoctrine()
             // or you can add an argument to the action: createCustomer(EntityManagerInterface $entityManager)
             $entityManager = $this->getDoctrine()->getManager();
 
             // Add current date time to new customer data
             $objDateTime = new DateTime('NOW');
             $lead->setDateCreated($objDateTime);
             $lead->setDateModified($objDateTime);
 
             // tell Doctrine you want to (eventually) save the customer (no queries yet)
             $entityManager->persist($lead);
             
             // actually executes the queries (i.e. the INSERT query)
             $entityManager->flush();
 
             //return new RedirectResponse($this->generateUrl('viewCustomers'));
             return new Response('Saved new lead with id ' . $lead->getId());
         }
    }
    /**
     * @Route("/leads/new", name="newLead")
     */
    public function newLead()
    {
        $lead = new Leads();
        $formNewLead = $this->createForm(NewLeadsType::class, $lead, [
            'action' => $this->generateUrl('addLead'),
            'method' => 'POST',
        ]);

        return $this->render('leads/newLead.html.twig', [
            'form' => $formNewLead->createView(),
        ]);
    }
    /**
     * @Route("/leads", name="leadsManager")
     */
    public function index()
    {
        return $this->render('leads/index.html.twig', [
            'controller_name' => 'LeadsController',
        ]);
    }
}
