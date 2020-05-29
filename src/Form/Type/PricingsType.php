<?php

namespace Tdevos\SyliusPriceEvolvePlugin\Form\Type;

use Tdevos\SyliusPriceEvolvePlugin\Entity\Channel\OverTimePrice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PricingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("price")
            ->add("startDate", DateTimeType::class, [
                "widget" => "single_text"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OverTimePrice::class
        ]);
    }
}
