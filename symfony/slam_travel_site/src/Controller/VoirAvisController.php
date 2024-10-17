<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoirAvisController extends AbstractController
{
    #[Route('/voir/avis', name: 'app_voir_avis')]
    public function index(EntityManagerInterface $entityManager, Request $request, AvisRepository $avisRepository): Response
    {

        $avisList = $avisRepository->findAll();

        return $this->render('voir_avis/index.html.twig', [
            'controller_name' => 'VoirAvisController',
            'page_title' => 'Liste Avis',
            'avisList' => $avisList,
        ]);
    }
}
