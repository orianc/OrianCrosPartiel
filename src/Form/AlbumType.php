<?php

namespace App\Form;

use DateTime;
use App\Entity\Album;
use App\Entity\Artiste;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AlbumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,
            [
                'label' => "Nom de l'album",
                'empty_data' => '',
                'attr' => [
                    'placeholder' => "Entrez le nom de l'album ici"
                ]
            ])
            ->add('pochette')
            ->add('annee', DateType::class, [
                'widget' => 'choice',
                'empty_data' => '',
             

                ])
            ->add('genre')
            ->add('presentation', TextareaType::class,
            [
                'label' => 'Présentation',
                'empty_data' => '',

                'attr' => ['placeholder' => "Vous pouvez présenter l'album dans ce champ"]
            ])
            ->add('artiste', EntityType::class,[
                'class' => Artiste::class,
                'label' => 'Artiste',
                'choice_label' => 'nom'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Album::class,
            'attr' => [
                'novalidate' => 'novalidate'
            ]

        ]);
    }
}
