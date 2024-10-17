<?php
namespace App\Controller;

use App\Entity\Avis;
use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;


class AvisController extends AbstractController
{
    #[Route('/avis', name: 'app_avis')]
    public function index(EntityManagerInterface $entityManager, Request $request, AvisRepository $avisRepository): Response
    {
        $avisList = $avisRepository->findAll();

        if ($request->isMethod('POST')) {
            $descriptionavis = $request->request->get('descriptionavis');
            $noteavis = $request->request->get('noteavis');

            $user = $this->getUser();

            if ($user) {
                $avis = new Avis();
                $avis->setDescriptionavis($descriptionavis);
                $avis->setNoteavis($noteavis);
                $avis->setDateavis(new \DateTime());


                $username = $user->getUsername();
                $avis->setAuteuravis($username);

                $entityManager->persist($avis);
                $entityManager->flush();

                return $this->redirectToRoute('app_voir_avis');
            } else {
                return $this->redirectToRoute('app_login');
            }
        }

        return $this->render('avis/index.html.twig', [
            'controller_name' => 'AvisController',
            'page_title' => 'Avis',
            'avis_list' => $avisList
        ]);
    }
}











