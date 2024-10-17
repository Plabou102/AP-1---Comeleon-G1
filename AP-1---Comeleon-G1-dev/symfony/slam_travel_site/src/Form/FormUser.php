<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use App\Form\FormUser;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class FormUser extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'constraints' => [
                new NotBlank(['message' => 'Le nom est requis.']),
            ],
        ])
        ->add('prenom', TextType::class, [
            'constraints' => [
                new NotBlank(['message' => 'Le prénom est requis.']),
            ],
        ])
        ->add('username', TextType::class, [
            'constraints' => [
                new NotBlank(['message' => 'Le nom d’utilisateur est requis.']),
            ],
        ])
        ->add('password', PasswordType::class, [
            'constraints' => [
                new NotBlank(['message' => 'Le mot de passe est requis.']),
            ],
        ])
        ; 
        
        if ($options['is_admin']) {
            $builder
                ->add('roles', ChoiceType::class, [
                    'choices' => [
                        'User' => 'ROLE_USER',
                        'Admin' => 'ROLE_ADMIN',
                    ],
                    'expanded' => false,
                    'multiple' => true,
                    'attr' => ['class' => 'form-check'],
                ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
            'is_admin' => false,
        ]);


        $resolver->setDefined('is_admin');
        $resolver->setAllowedTypes('is_admin', 'bool');
    }
}