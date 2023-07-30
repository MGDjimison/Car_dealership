<?php

namespace App\Form;

use App\Entity\CarCategory;
use App\Entity\Search;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('q', TextType::class, [
                'attr' => ['placeholder' => 'Rechercher'],
                'required' => false,
                'label' => false,
                'empty_data' => ''
            ])
            ->add('categories', EntityType::class, [
                'class' => CarCategory::class,
                'expanded' => true,
                'multiple' => true,
                'label' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => Search::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
}
