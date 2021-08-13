<?php

namespace App\Form;

use App\Entity\Librarian;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LibrarianType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sysrole', null, [
                'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('fname', null, [
                'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('lname', null, [
                'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('dob', null, [
                'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('gender', null, [
                'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('mobile', null, [
                'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('email', null, [
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
            'data_class' => Librarian::class,
        ]);
    }
}
