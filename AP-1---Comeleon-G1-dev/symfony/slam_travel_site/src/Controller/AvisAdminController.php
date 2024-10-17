<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class AvisAdminController extends AbstractController
{
    #[Route('/avis/admin', name: 'app_avis_admin', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(EntityManagerInterface $entityManager, Request $request, AvisRepository $avisRepository): Response
    {
        $avisList = $avisRepository->findAll();

        return $this->render('avis_admin/index.html.twig', [
            'controller_name' => 'AvisAdminController',
            'page_title' => 'Liste Avis Admin',
            'avisList' => $avisList,
        ]);
    }

    #[Route('/avis/admin/{id}', name: 'app_avis_admin_delete', methods: ['DELETE','POST'])]
    public function delete(int $id, EntityManagerInterface $entityManager, AvisRepository $avisRepository, Request $request, CsrfTokenManagerInterface $csrfTokenManager): Response
    {
        $avis = $avisRepository->find($id);
    
        if ($avis) {
            $submittedToken = $request->request->get('_token');
            if ($csrfTokenManager->isTokenValid(new CsrfToken('delete' . $avis->getId(), $submittedToken))) {
                $entityManager->remove($avis);
                $entityManager->flush();
                $this->addFlash('success', 'Avis supprimé avec succès.');
            } else {
                $this->addFlash('error', 'Token CSRF invalide.');
            }
        } else {
            $this->addFlash('error', 'Avis introuvable.');
        }
    
        return $this->redirectToRoute('app_avis_admin');
    }
    

}



