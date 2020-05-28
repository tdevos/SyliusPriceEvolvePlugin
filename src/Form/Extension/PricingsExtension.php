<?php

namespace SyliusPriceEvolvePlugin\Form\Extension;

use Sylius\Bundle\CoreBundle\Form\Type\Product\ChannelPricingType;
use Sylius\Bundle\ProductBundle\Form\Type\ProductVariantType;
use SyliusPriceEvolvePlugin\Form\Type\PricingsType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class PricingsExtension extends AbstractTypeExtension {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->remove('price')->remove('originalPrice');
        $builder->add("overTimePrices", CollectionType::class, [
            'entry_type' => PricingsType::class,
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false
        ]);
    }

    public static function getExtendedTypes()
    {
        return [
            ChannelPricingType::class
        ];
    }
}
