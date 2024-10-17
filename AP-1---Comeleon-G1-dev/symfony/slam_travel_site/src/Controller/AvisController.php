<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    #[Route('/avis', name: 'app_avis')]
    public function index(EntityManagerInterface $entityManager, Request $request, AvisRepository $avisRepository): Response
    {
        $avisList = $avisRepository->findAll();

        if ($request->isMethod('POST')) {
            $auteuravis = $request->request->get('auteuravis');
            $descriptionavis = $request->request->get('descriptionavis');
            $noteavis = $request->request->get('noteavis');

            $avis = new Avis();
            $avis->setAuteuravis($auteuravis);
            $avis->setDescriptionavis($descriptionavis);
            $avis->setNoteavis($noteavis);
            $avis->setDateavis(new \DateTime()); 

            $entityManager->persist($avis);
            $entityManager->flush();

            return $this->redirectToRoute('app_voir_avis');
        }

        return $this->render('avis/index.html.twig', [
            'controller_name' => 'AvisController',
            'page_title' => 'Avis',
        ]);
    }
}







