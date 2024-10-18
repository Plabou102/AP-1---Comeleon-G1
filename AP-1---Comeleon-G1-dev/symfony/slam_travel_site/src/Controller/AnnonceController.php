<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Annonce;
use App\Form\AnnonceType;
use Symfony\Component\String\Slugger\SluggerInterface;

class AnnonceController extends AbstractController
{
    #[Route('/annonce', name: 'app_annonce')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $AnnonceRepository=$em->getRepository(Annonce::class);
        $lesAnnonces=$AnnonceRepository->findAll();

        return $this->render('annonce/index.html.twig', [
            'controller_name' => 'AnnonceController',
            'lesAnnonces' => $lesAnnonces,
            'page_title' => 'Annonce'
        ]);
    }

    #[Route('/ajoutAnnonce', name: 'app_ajoutAnnonce')]
    public function ajoutAnnonce(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {   
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $AnnonceRepository=$em->getRepository(Annonce::class);
        $lesAnnonces=$AnnonceRepository->findAll();
        $annonce = new Annonce();
        $AnnonceType = $this->createForm(AnnonceType::class, $annonce);
        
        $AnnonceType->handleRequest($request);

        if($AnnonceType->isSubmitted() && $AnnonceType->isvalid()){

            $em->persist($annonce);
            $em->flush();
            return $this->redirectToRoute('app_annonce', [
                'page_title' => 'Annonce',
                'lesAnnonces' => $lesAnnonces
            ]);
        }

        return $this->render('annonce/ajoutAnnonce.html.twig', [
            'AnnonceType' => $AnnonceType->createView(),
            'page_title' => 'Annonce',
            'lesAnnonces' => $lesAnnonces
        ]);
    }

    #[Route('/motificationAnnonce{id}', name: 'app_modificationAnnonce')]
    public function modificationAnnonce(Request $request, EntityManagerInterface $em, int $id): Response
    {   
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $annonce = $em->getRepository(Annonce::class)->find($id);

        $AnnonceType = $this->createForm(AnnonceType::class, $annonce);
        
        $AnnonceType->handleRequest($request);

        if($AnnonceType->isSubmitted() && $AnnonceType->isvalid()){

            $em->persist($annonce);
            $em->flush();

            $annonceRepository=$em->getRepository(Annonce::class);
            $lesAnnonces=$annonceRepository->findAll();

            return $this->redirectToRoute('app_annonce', [
                'message' => 'Annonce modifiée avec succès !',
                'lesAnnonces' => $lesAnnonces,
                'page_title' => 'Annonce'
            ]);
        }

        $annonceRepository=$em->getRepository(Annonce::class);
        $lesAnnonces=$annonceRepository->findAll();

        return $this->render('annonce/modificationAnnonce.html.twig', [
            'AnnonceType' => $AnnonceType->createView(),
            'lesAnnonces' => $lesAnnonces,
            'page_title' => 'Annonce'
        ]);
    }

    #[Route('/supprimerAnnonce{id}', name: 'app_supprimerAnnonce')]
    public function supprimmerAnnonce(Request $request, EntityManagerInterface $em, int $id): Response
    {   
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $annonce = $em->getRepository(Annonce::class)->find($id);
        
        if (!$annonce) {
            return $this->redirectToRoute('app_annonce'); 
        }

        if ($this->isCsrfTokenValid('delete' . $annonce->getId(), $request->request->get('_token'))) {
            $em->remove($annonce);
            $em->flush();
        } 
        else {

        }

        $annonceRepository=$em->getRepository(Annonce::class);
        $lesAnnonces=$annonceRepository->findAll();

        return $this->render('annonce/index.html.twig', [
            'lesAnnonces' => $lesAnnonces,
            'page_title' => 'Annonce'
        ]);
    }
}
