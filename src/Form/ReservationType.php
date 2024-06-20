<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('guests', CollectionType::class, [
            'entry_type' => GuestType::class,
            'entry_options' => ['label' => false],
            'by_reference'=> false,
            'allow_add' => true,
            'allow_delete' => true
            ])
            ->add('checkinDate', null, [
                'widget' => 'single_text',
            ])
            ->add('checkoutDate', null, [
                'widget' => 'single_text',
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
