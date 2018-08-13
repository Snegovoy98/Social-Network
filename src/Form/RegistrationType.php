<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\{TextType,
                                                PasswordType,
                                                SubmitType,
                                                BirthdayType,
                                                CountryType
                                                        };
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName', TextType::class, [
                'attr' =>
                    ['name' => 'lastName', 'id' => 'lastName'],
                'constraints' => [new Length(['min' => 3, 'max' => 15]),
                    new NotBlank()
                ]
                ])
            ->add('firstName', TextType::class, [
                'attr' =>
                    ['name' => 'firstName', 'id' => 'firstName'],
                'constraints' => [new Length(['min' => 3, 'max' => 10]),
                    new NotBlank()
                ]
            ])
            ->add('fatherName', TextType::class ,[
                'attr' =>
                    ['name' => 'fatherName', 'id' => 'fatherName'],
                'constraints' => [new Length(['min' => 6, 'max' => 15]),
                    new NotBlank()
                ]
            ])
            ->add('login', TextType::class, [
                'constraints' => [new Length(['min' => 6, 'max' => 32]),
                                  new NotBlank()
                ]
            ])
            ->add('password', PasswordType::class, [
                'constraints' => [new Length(['min' => 8, 'max' => 32]),
                    new NotBlank()
                ],
                'first_options'  => ['label' => 'Password'],
                'second_options' => ['label' => 'Repeat Password']
            ])
            ->add('birthdate', BirthdayType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-ddd'
            ])
            ->add('countries', CountryType::class)
            ->add('submit', SubmitType::class)
            ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {

    }
}