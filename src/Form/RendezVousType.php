<?php

namespace App\Form;

use App\Entity\RendezVous;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;  
use App\Entity\Doctor;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;



class RendezVousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('label', null, [
                'label' => 'Description du rdv',
            ])
            ->add('date_du_rdv', DateTimeType::class, [
                'label' => 'Date & heure du rdv',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd HH:mm',
                'placeholder' => 'JJ-MM-AAAA HH:MM',
                'row_attr' => ['id' => 'kt_datetimepicker_4_2'],
                // prevents rendering it as type="date", to avoid HTML5 date pickers
                'html5' => false,
            ])
            ->add('isArchived', CheckboxType::class, [
                'label' => 'Confirmation',
                'data' => true,
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input',
                ],
            ])
            ->add('doctor', EntityType::class, [
                'class' => Doctor::class,
                'choice_label' => 'nom'
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
