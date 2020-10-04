<?php

namespace App\Form;

use App\Form\ImagType;
use App\Entity\Annonce;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('prix')
            ->add('image1', ImagType::class, [
                'required' => false
            ])
            // ->add('image2', ImagType::class, [
            //     'required' => false
            // ])
            // ->add('image3', ImagType::class, [
            //     'required' => false
            // ])
            ->add('negociable')
            ->add('description')
            //->add('archived')
            //->add('seen')
            //->add('valide')
            //->add('validerpar')
            //->add('user', EntityType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
