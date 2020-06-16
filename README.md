<h1 align="center">Plugin "Sylius Price Evolve Plugin"</h1>

<p align="center">Schedule your prices</p>

## Documentation

This plugin propose to schedule the price of a product. Set a startTime, and forget it

## Quickstart Installation

1. Run `composer require tdevos/sylius-price-evolve-plugin`.

2. Add `Tdevos\SyliusPriceEvolvePlugin\SyliusPriceEvolvePlugin::class => ['all' => true]` to your bundle.php

3. Create a file `config/packages/pricing_extension.yaml`
```
services: 
   app.form.extension.type.channelpriceType:
       class: Tdevos\SyliusPriceEvolvePlugin\Form\Extension\PricingsExtension
       tags:
           - { name: form.type_extension, extended_type: Sylius\Bundle\CoreBundle\Form\Type\Product\ChannelPricingType, priority: 10 }
```

4. Add this trait to `src/Entity/Channel/ChannelPricing.php`
```
class ChannelPricing extends BaseChannelPricing
{
    use PluginChannelPricing;
}
```

5. Enjoy !
