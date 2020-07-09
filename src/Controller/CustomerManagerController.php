<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Form\NewCustomerType;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;


class CustomerManagerController extends AbstractController
{
    /**
     * @Route("/view-customers", name="viewCustomers")
     */
    public function viewCustomers()
    {
        $repository = $this->getDoctrine()
                        ->getRepository(Customer::class);
        $customers = $repository->findAll();

        return $this->render('customer_manager/viewCustomers.html.twig', [
            'controller_name' => 'CustomerManagerController',
            'customers' => $customers,
        ]);
    }
    /**
     * @Route("/customer/{customerID}", name="showCustomer")
     */
    public function showCustomer($customerID)
    {
        $customer = $this->getDoctrine()
            ->getRepository(Customer::class)
            ->find($customerID);

        if (!$customer) {
            throw $this->createNotFoundException(
                'No product found for id ' . $customerID
            );
        }

        //return new Response('Check out this great customer ' . $customer->getFullName());

        // or render a template
        // in the template, print things with {{ product.name }}
        return $this->render('customer_manager/viewCustomer.html.twig', ['customer' => $customer]);
    }

    /**
     * @Route("/customer-manager/add-customer", name="addCustomer",  methods={"POST"})
     */
    public function createCustomer(): Response
    {
        // Get POST information sent
        $request = Request::createFromGlobals();
        // Start a new customer object
        $customer = new Customer();
        // Create a new form object and bound to customer class
        $formNewCustomer = $this->createForm(NewCustomerType::class, $customer);
        // Attach POST request data to customer class
        $formNewCustomer->handleRequest($request);

        // Check that the form validates
        if ($formNewCustomer->isSubmitted() && $formNewCustomer->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $newCustomer = $formNewCustomer->getData();

            // you can fetch the EntityManager via $this->getDoctrine()
            // or you can add an argument to the action: createCustomer(EntityManagerInterface $entityManager)
            $entityManager = $this->getDoctrine()->getManager();

            // Add current date time to new customer data
            $objDateTime = new DateTime('NOW');
            $customer->setDateCreated($objDateTime);
            $customer->setDateModified($objDateTime);

            // tell Doctrine you want to (eventually) save the customer (no queries yet)
            $entityManager->persist($customer);
            
            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();

            return new RedirectResponse($this->generateUrl('viewCustomers'));
            //return new Response('Saved new product with id ' . $customer->getId());
        }


    }
    /**
     * @Route("/customer-manager/new-customer", name="newCustomer" )
     */
    public function newCustomer()
    {
        $customer = new Customer();
        $formNewCustomer = $this->createForm(NewCustomerType::class, $customer, [
            'action' => $this->generateUrl('addCustomer'),
            'method' => 'POST',
        ]);

        return $this->render('customer_manager/newCustomer.html.twig', [
            'form' => $formNewCustomer->createView(),
        ]);
    }
    /**
     * @Route("/customer-manager", name="customerManager")
     */
    public function index()
    {
        return $this->render('customer_manager/index.html.twig', [
            'controller_name' => 'CustomerManagerController',
        ]);
    }
}
