<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\Genre;
use App\Entity\Movie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $textInputCss = 'block w-full px-4 py-2 mt-1 text-gray-900 bg-white placeholder-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm';
        
        $builder
            ->add('title', TextType::class, [
            'label' => 'Title',
            'required' => false,
            'attr' => [
                'class' => $textInputCss
            ]
        ])
        ->add('description', TextareaType::class, [
            'label' => 'Description',
            'required' => false,
            'attr' => [
                'class' => $textInputCss
            ]
        ])
            ->add('runtime', IntegerType::class, [
            'label' => 'Runtime',
            'required' => false,
            'attr' => [
                'class' => $textInputCss
            ]
        ])
        ->add('budget', null, [
            'label' => 'Budget',
            'required' => false,
            'attr' => [
                'class' => $textInputCss
            ]
        ])
        ->add('poster', null, [
            'label' => 'Poster',
            'required' => false,
            'attr' => [
                'class' => $textInputCss
            ]
        ])
        ->add('release_date', DateType::class, [
            'label' => 'Release Date',
            'widget' => 'single_text',
            'attr' => [
                'class' => $textInputCss
            ]
        ])
        ->add('genre', null, [
            'label' => 'Genre',
            'attr' => [
                'class' => 'block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500'
            ]
        ])
        ->add('country', null, [
            'label' => 'Country',
            'attr' => [
                'class' => 'block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500'
            ]
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
