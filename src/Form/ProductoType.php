<?php

namespace App\Form;

use App\Entity\Producto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('precio')
            ->add('categoria')
            // ->add('categoria', EntityType::class, [
            //     'class' => Categoria::class,
            //     'multiple' => false,
            //     'constraints' => [
            //         new Count([
            //             'min' => 1,
            //             'max' => 1,
            //             'minMessage' => 'You must select at least one category',
            //             'maxMessage' => 'You can only select one category'
            //         ])
            //     ]
            // ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Producto::class,
        ]);
    }
}