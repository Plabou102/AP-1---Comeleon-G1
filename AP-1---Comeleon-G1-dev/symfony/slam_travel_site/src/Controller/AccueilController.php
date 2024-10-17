<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(EntityManagerInterface $em, UserPasswordHasherInterface $hasher): Response
    {

        $existingUser = $em->getRepository(Utilisateur::class)->findOneBy(['username' => 'Plabou']);

        if (!$existingUser) {
            $user = new Utilisateur();
            $user->setNom('BOUSSAIDA')
                ->setPrenom('Adame')
                ->setUsername('Plabou')
                ->setPassword($hasher->hashPassword($user, 'pass12345678'))
                ->setRoles(['ROLE_ADMIN']);
            $em->persist($user);
            $em->flush();
        }

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'page_title' => 'Accueil'
        ]);
    }


}
