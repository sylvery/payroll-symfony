<?php

namespace App\Form;

use App\Entity\Publisher;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PublisherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullname', null, [
                'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('locationAddress', null, [
                'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                'attr' => ['class' => 'form-control'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Publisher::class,
        ]);
    }
}
