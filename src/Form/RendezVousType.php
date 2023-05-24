<?php

namespace App\Form;

use App\Entity\RendezVous;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;




class RendezVousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('label')
            ->add('date_du_rdv', DateType::class, [
                'widget' => 'single_text',
            
                // prevents rendering it as type="date", to avoid HTML5 date pickers
                'html5' => false,
            
                // adds a class that can be selected in JavaScript
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('heure_du_rdv')
         //   ->add('isArchived')
            ->add('doctor', ChoiceType::class, [
                'choices'  => [
                    'Dentiste' => 'dentiste',
                    'Pediatre' => 'pediatre',
                    'Cardiologue' => 'cardiologue',
                ],
            ])
         //   ->add('createdBy')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RendezVous::class,
        ]);
    }
}
