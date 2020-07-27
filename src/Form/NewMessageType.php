<?php

namespace App\Form;

use App\Entity\Messages;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NewMessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('leadId', IntegerType::class, [
                'required' => true,
            ])
            ->add('message', TextareaType::class, [
                'required' => true,
            ])
            ->add('messageType', IntegerType::class, [
                'required' => true,
            ])
            ->add('messageStatus', IntegerType::class, [
                'required' => true,
            ])
            ->add('messageOrigin', TextType::class, [
                'required' => true,
            ])
            ->add('date_created', HiddenType::class, [
                'required' => false,
            ])
            ->add('date_modified', HiddenType::class, [
                'required' => false,
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Messages::class,
        ]);
    }
}
