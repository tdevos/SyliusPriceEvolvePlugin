<?php

declare(strict_types=1);

namespace SyliusPriceEvolvePlugin\Entity\Channel;

use App\Repository\OverTimePriceRepository;
use App\Entity\Channel\ChannelPricing;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OverTimePriceRepository::class)
 */
class OverTimePrice
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="integer")
     * @var int|null
     */
    public $price;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    public $startDate;

    /**
     * @ORM\ManyToOne(targetEntity=ChannelPricing::class, inversedBy="overTimePrices")
     */
    public $channelPricing;

}
