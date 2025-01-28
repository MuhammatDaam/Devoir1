<?php

namespace App\Form;

use App\Entity\Agency;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgencyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero', TextType::class, [
                'required' => true,
                'label' => 'Numéro'
            ])
            ->add('adresse', TextType::class, [
                'required' => true,
                'label' => 'Adresse'
            ])
            ->add('telephone', TextType::class, [
                'required' => true,
                'label' => 'Téléphone'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Agency::class,
        ]);
    }
}
