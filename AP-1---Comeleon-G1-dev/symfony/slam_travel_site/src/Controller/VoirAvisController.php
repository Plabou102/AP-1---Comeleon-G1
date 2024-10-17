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

    #[Route('/voir-avis/supprimer/{id}', name: 'app_voir_avis_delete', methods: ['DELETE','POST'])]
    public function delete(Avis $avis, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($avis->getAuteuravis() !== $this->getUser()->getUsername()) {
            throw new AccessDeniedException("Vous n'avez pas le droit de supprimer cet avis.");
        }

        if ($this->isCsrfTokenValid('delete' . $avis->getId(), $request->request->get('_token'))) {
            $entityManager->remove($avis);
            $entityManager->flush();

        $this->addFlash('success', 'Avis supprimé avec succès.');

        return $this->redirectToRoute('app_voir_avis');
    }
}
}
