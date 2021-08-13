<?php

namespace App\Form;

use App\Entity\Publication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isbn', null, [
                'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('pubyear', null, [
                'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('book', CollectionType::class, [
                'allow_add' => true,
                'entry_type' => BookType::class,
                'entry_options' => ['label' => false],
                // 'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                // 'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                // 'attr' => ['class' => 'form-control'],
            ])
            ->add('publisher', null, [
                'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                'attr' => ['class' => 'form-control'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Publication::class,
        ]);
    }
}
