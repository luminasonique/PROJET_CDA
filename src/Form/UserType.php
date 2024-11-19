<?php

namespace App\Form;

use App\Entity\User;
use App\Enum\Status;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('email')
            ->add('password')
            ->add('roles')
            ->add('status', ChoiceType::class, [
                'choices' => array_flip(Status::cases()),  // Flip the enum values for choice selection
                'choice_label' => function ($choice) {
                    return $choice->value;  // Display the string values of the enum (e.g., 'draft', 'published')
                },
                'placeholder' => 'Select a status',  // Optional: add a placeholder text
            ])
            ->add('presence');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}