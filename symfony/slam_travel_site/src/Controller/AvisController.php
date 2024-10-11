<?php

// src/Controller/AvisController.php
namespace App\Controller;

use App\Entity\Avis; // Entity pour Avis
use Doctrine\ORM\EntityManagerInterface; // Gérer les entités
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request; // Pour récupérer la requête POST
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    #[Route('/avis', name: 'app_avis')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        // Si la requête est en POST, traiter le formulaire pour enregistrer l'avis
        if ($request->isMethod('POST')) {
            $auteuravis = $request->request->get('auteuravis');
            $descriptionavis = $request->request->get('descriptionavis');
            $noteavis = $request->request->get('noteavis');

            // Créer un nouvel avis
            $avis = new Avis();
            $avis->setAuteuravis($auteuravis);
            $avis->setDescriptionavis($descriptionavis);
            $avis->setNoteavis($noteavis);
            $avis->setDateavis(new \DateTime()); // Enregistrer la date actuelle

            // Sauvegarder dans la base de données
            $entityManager->persist($avis);
            $entityManager->flush();

            // Rediriger après soumission
            return $this->redirectToRoute('app_avis');
        }

        return $this->render('avis/index.html.twig', [
            'controller_name' => 'AvisController',
        ]);
    }
}



