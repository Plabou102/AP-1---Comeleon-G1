<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prixannonce')
            ->add('nbmaxpersonne')
            ->add('datedepart', null, [
                'widget' => 'single_text',
            ])
            ->add('dateretour', null, [
                'widget' => 'single_text',
            ])
            ->add('paysannonce')
            ->add('villeannonce')
            ->add('descriptionannonce')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
