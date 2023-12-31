<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\CarCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nbSeats')
            ->add('nbDoors')
            ->add('name')
            ->add('cost')
            ->add('category', EntityType::class, [
                'class' => CarCategory::class,
                'choice_label' => function (CarCategory $carCategory) {
                    return $carCategory->getName();
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
