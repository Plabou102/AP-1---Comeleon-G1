<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvisAdminController extends AbstractController
{
    #[Route('/avis/admin', name: 'app_avis_admin', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager, Request $request, AvisRepository $avisRepository): Response
    {

        $avisList = $avisRepository->findAll();

        return $this->render('avis_admin/index.html.twig', [
            'controller_name' => 'AvisAdminController',
            'page_title' => 'Liste Avis Admin',
            'avisList' => $avisList,
        ]);
    }
}


