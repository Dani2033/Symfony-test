<?php

namespace App\Form;

use App\Entity\Guest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class GuestType extends AbstractType
{
    private TokenStorageInterface  $token;

    public function __construct(TokenStorageInterface $token)
    {
        $this->token = $token;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name',
                'attr' => ['class' => 'form-control']
            ])
            ->add('surname', TextType::class, [
                'label' => 'Surname',
                'attr' => ['class' => 'form-control']
            ])
            ->add('birthday', DateType::class, [
                'label' => 'Birthday',
                'widget' => 'single_text',
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('gender', ChoiceType::class, [
                'choices'  => [
                    'M' => "M",
                    'F' => "F",
                    'X' => "X",
                ],
                'attr' => ['class' => 'form-control']
            ])
            ->add('passportNumber', TextType::class, [
                'label' => 'Passport Number',
                'attr' => ['class' => 'form-control']
            ])
            ->add('userId', HiddenType::class, [
                'label' => 'User ID',
                'attr' => ['class' => 'form-control my-3'],
                'data' => $this->token->getToken()->getUser()->getId() //todo this is not properly implemented but cannot afford to spend more time on it rn
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Guest::class,
        ]);
    }
}
