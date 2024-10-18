<?php

namespace App\Controller;
use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(EntityManagerInterface $entityManager, Request $request, ContactRepository $ContactRepository): Response
    {
        $contact= new Contact();

        $form=$this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager->persist($contact);
            $entityManager->flush();
    
            return $this->redirectToRoute('contact');
        }
    
        
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'page_title' => 'Contact',
            'form'=> $form->createView()
        ]);
    }

}