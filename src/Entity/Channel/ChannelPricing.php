<?php

declare(strict_types=1);

namespace Tdevos\SyliusPriceEvolvePlugin\Entity\Channel;
use Doctrine\ORM\Mapping as ORM;

use Tdevos\SyliusPriceEvolvePlugin\Entity\Channel\OverTimePrice;
use Doctrine\ORM\PersistentCollection;

trait ChannelPricing
{
    /**
     * @ORM\OneToMany(targetEntity=OvertimePrice::class, mappedBy="channelPricing",cascade={"persist"})
     * @var OverTimePrice[]
     */
    protected $overTimePrices;

    public function getPrice(): ?int{
        $price = 0;
        foreach ($this->overTimePrices as $overTimePrice) {
            if($overTimePrice->startDate < new \DateTime())
                $price = $overTimePrice->price;
        }
        return $price;
    }

    public function getOriginalPrice(): ?int{
        $price = 0;
        foreach ($this->overTimePrices as $overTimePrice) {
            if($overTimePrice->startDate < new \DateTime())
                $price = $overTimePrice->originalPrice;
        }
        return $price;
    }

    /**
     * @return PersistentCollection
     */
    public function getOverTimePrices(): PersistentCollection
    {
        return $this->overTimePrices;
    }

    public function addOverTimePrice(OverTimePrice $overTimePrice) {
        $overTimePrice->channelPricing = $this;
        $this->overTimePrices->add($overTimePrice);
    }

    public function removeOverTimePrice(OverTimePrice $overTimePrice) {
        $overTimePrice->channelPricing = null;
        $this->overTimePrices->removeElement($overTimePrice);
    }

}
