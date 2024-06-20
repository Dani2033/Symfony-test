<?php

namespace App\Form;

use App\Entity\Guest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GuestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name'
            ])
            ->add('surname', TextType::class, [
                'label' => 'Surname'
            ])
            ->add('birthday', DateType::class, [
                'label' => 'Birthday',
                'widget' => 'single_text',
                'required' => false
            ])
            ->add('gender', ChoiceType::class, [
                'choices'  => [
                    'M' => "M",
                    'F' => "F",
                    'X' => "X",
                ],
            ])
            ->add('passportNumber', TextType::class, [
                'label' => 'Passport Number'
            ])
            ->add('userId', TextType::class, [
                'label' => 'User ID'
            ])
            ->add('reservationId', TextType::class, [
                'label' => 'Reservation ID'
            ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Guest::class,
        ]);
    }
}
