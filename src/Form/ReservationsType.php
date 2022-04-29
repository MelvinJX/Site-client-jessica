<?php

namespace App\Form;

use App\Entity\Reservations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                    'label' => 'firstName',
                    'attr' => [
                        'placeholder' => 'Nom'
                    ]
                ])
            ->add('firstName', TextType::class, [
                    'label' => 'Name',
                    'attr' => [
                        'placeholder' => 'Prénom'
                    ]
                ])
            ->add('meetDate', ChoiceType::class, [
                'choices' => [
                    'choice1' => '01',
                    'choice2' => '02',
                    'choice3' => '03',
                    'choice4' => '04',
                    'choice5' => '05',
                    'choice6' => '06',
                    'choice7' => '07',
                    'choice8' => '08',
            ]
            ])
            ->add('phoneNumber', TelType::class, [
                'attr' => [
                    'maxlength' => 10,
                    'minlength' => 10
                ]
            ])
            ->add('topic', ChoiceType::class, [
                'choices' => [
                    'Coaching' => 'choice1',
                    'Autre' => 'choice2'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Confirmer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservations::class,
        ]);
    }
}
