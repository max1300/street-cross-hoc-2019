<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label' =>'Nom :',
                'attr' => [
                    'placeholder' => 'entrez un username'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' =>'Password :',
                'attr' => [
                    'placeholder' => 'entrez un password'
                ]
            ] )
            ->add('email', EmailType::class, [
                'label' =>'Email :',
                'attr' => [
                    'placeholder' => 'entrez un email'
                ]
            ])
            ->add('content', TextareaType::class, ['mapped' => false, 'label' => 'Message :'])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
