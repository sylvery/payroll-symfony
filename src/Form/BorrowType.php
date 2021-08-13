<?php

namespace App\Form;

use App\Entity\Borrow;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Event\PreSetDataEvent;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BorrowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA ,function (FormEvent $event) {
            $borrow = $event->getData();
            $form = $event->getForm();
            if ($borrow->getBorrowDate()) {
                $form
                    ->add('returnDate', null, [
                        'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                        'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                        'attr' => ['class' => 'form-control'],
                        'input' => 'string',
                        'widget' => 'single_text',
                    ])
                    ->add('conditionWhenReturned', ChoiceType::class, [
                        'choices' => [
                            'Perfect' => 'perfect',
                            'Damaged' => 'damaged',
                        ],
                        'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                        'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                        'attr' => ['class' => 'form-control'],
                    ])
                    ->add('penalty', null, [
                        'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                        'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                        'attr' => ['class' => 'form-control'],
                    ])
                ;
            } else {
                $form
                    ->add('book', null, [
                        'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                        'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                        'attr' => ['class' => 'form-control'],
                    ])
                    ->add('conditionBeforeBorrow', ChoiceType::class, [
                        'choices' => [
                            'Perfect' => 'perfect',
                            'Damaged' => 'damaged',
                        ],
                        'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                        'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                        'attr' => ['class' => 'form-control'],
                    ])
                    ->add('student', null, [
                        'row_attr' => ['class' => 'col-md-6 input-group mb-2'],
                        'label_attr' => ['class' => 'col-4 text-muted input-group-prepend'],
                        'attr' => ['class' => 'form-control'],
                    ])
                ;
            }
            return $form;
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Borrow::class,
        ]);
    }
}
