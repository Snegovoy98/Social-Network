<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\{TextType,
                                                PasswordType,
                                                SubmitType,
                                                BirthdayType,
                                                CountryType,
                                                ChoiceType,
                                                RadioType
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
                'label' => 'Фамилия',
                'attr' =>
                    ['name' => 'lastName',
                     'id' => 'lastName',
                      'class' => 'form-control',
                      'placeholder' => 'Введите фамилию'
                    ],
                'constraints' => [new Length(['min' => 3, 'max' => 15]),
                    new NotBlank()
                ]
                ])
            ->add('firstName', TextType::class, [
                'label' => 'Имя',
                'attr' =>
                    ['name' => 'firstName',
                     'id' => 'firstName',
                     'class' => 'form-control',
                     'placeholder' => 'Введите имя'
                    ],
                'constraints' => [new Length(['min' => 3, 'max' => 10]),
                    new NotBlank()
                ]
            ])
            ->add('fatherName', TextType::class ,[
                'label' => 'Отчество',
                'attr' =>
                    ['name' => 'fatherName',
                     'id' => 'fatherName',
                     'class' => 'form-control',
                     'placeholder' => 'Введите отчество'
                    ],
                'constraints' => [new Length(['min' => 6, 'max' => 15]),
                    new NotBlank()
                ]
            ])
            ->add('login', TextType::class, [
                'label' => 'Логин',
                'constraints' => [new Length(['min' => 6, 'max' => 32]),
                                  new NotBlank()
                ],
                'attr' =>['class' => 'form-control',
                          'placeholder' => 'Введите логин']
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Пароль',
                'constraints' => [new Length(['min' => 8, 'max' => 32]),
                    new NotBlank()
                ],
                'attr' =>['class'       => 'form-control',
                          'placeholder' => 'Введите пароль']
            ])
            ->add('birthdate', BirthdayType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'placeholder' => 'Select a value',
                'attr'        => ['class' => 'custom-select d-block w-100',
                                    'name' => ''],
                'label'    => 'Дата рождения'
            ])
            ->add('country', CountryType::class, [
                'placeholder' => 'Select a value',
                'attr'        => ['class' => 'custom-select d-block w-100'],
                'label'       => 'Страна'
            ])
            ->add('states', ChoiceType::class , [
                'placeholder' => 'Select a value',
                'choices' => [
                    'Kabul' => 'AF'
                ],
                'attr'        => ['class' => 'custom-select d-block w-100'],
            ])
            ->add('gender', ChoiceType::class , [
                'placeholder' => 'Select a value',
                'choices' => [
                    'Мужской' => 'male',
                    'Женский' => 'female'
                ],
                'attr'        => ['class' => 'custom-select d-block w-100'],
                'label' => 'Пол'
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary btn-lg btn-block',
                            'value' => 'Зарегистрироваться']
            ])
            ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'error_mapping' => [
                'matchingCityAndZipCode' => 'city',
            ],
        ]);
    }
}