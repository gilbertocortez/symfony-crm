<?php

namespace App\Form;

use App\Entity\Leads;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NewLeadsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('eID', IntegerType::class, [
                'required' => false,
            ])
            ->add('address', TextType::class, [
                'required' => true,
            ])
            ->add('city', TextType::class, [
                'required' => true,
            ])
            ->add('zipCode', IntegerType::class, [
                'required' => true,
            ])
            ->add('companyDivision', IntegerType::class, [
                'required' => true,
            ])
            ->add('leadStatus', IntegerType::class, [
                'required' => true,
            ])
            ->add('saleAmount', NumberType::class, [
                'required' => true,
            ])
            ->add('salesperson', IntegerType::class, [
                'required' => true,
            ])
            ->add('leadSource', IntegerType::class, [
                'required' => false,
            ])
            ->add('dateModified', HiddenType::class, [
                'required' => false,
            ])
            ->add('dateCreated', HiddenType::class, [
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
            'data_class' => Leads::class,
        ]);
    }
}
