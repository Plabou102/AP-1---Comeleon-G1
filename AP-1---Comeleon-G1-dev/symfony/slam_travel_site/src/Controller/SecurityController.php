<?php

namespace App\Controller;

use App\Form\FormUser;
use App\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        //if ($this->getUser()) {
        //     return $this->redirectToRoute('app_accueil');
        // }

        // get the login error if there is ones
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error, 'page_title' => 'Connexion']);
    }

#[Route('/inscription', name: 'app_inscription')]
public function inscription(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher): Response
{   
    $user = new Utilisateur();

    $FormUser = $this->createForm(FormUser::class, $user, [
            'is_admin' => $this->isGranted('ROLE_ADMIN'),
        ]);

    
    $FormUser->handleRequest($request);

    if($FormUser->isSubmitted() && $FormUser->isValid()) {

        if (empty($user->getRoles())) {
            $user->setRoles(['ROLE_USER']);
        }

        $plainPassword = $user->getPassword();
        if ($plainPassword) {
            $hashedPassword = $passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Vous avez été inscrit avec succès.');

            return $this->redirectToRoute('app_login');
        }
        else{
            $this->addFlash('error', 'Veuillez remplir tous les champs.');
        }
    }

    return $this->render('security/inscription.html.twig', [
        'FormUser' => $FormUser->createView(),
    ]);
}

#[Route(path: '/logout', name: 'app_logout')]
public function logout(): void
{
    throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
}

}
