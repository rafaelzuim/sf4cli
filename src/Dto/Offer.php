<?php

namespace RafaelZuim\Sf4Cli\Dto;

/**
 * Class Offer
 * @package RafaelZuim\Sf4Cli
 */
class Offer
{
    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var int
     */
    private $vendorOffersCount;

    /**
     * @var float
     */
    private $price;

    /**
     * @var int
     */
    private $quantity;

    /**
     * Offer constructor.
     * @param \DateTime $createdAt
     * @param int $vendorOffersCount
     * @param float $price
     * @param int $quantity
     */
    public function __construct(\DateTime $createdAt, int $vendorOffersCount, float $price, int $quantity)
    {
        $this->setCreatedAt($createdAt)
            ->setVendorOffersCount($vendorOffersCount)
            ->setPrice($price)
            ->setQuantity($quantity);
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Offer
     */
    public function setCreatedAt(\DateTime $createdAt): Offer
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return int
     */
    public function getVendorOffersCount(): int
    {
        return $this->vendorOffersCount;
    }

    /**
     * @param int $vendorOffersCount
     * @return Offer
     */
    public function setVendorOffersCount(int $vendorOffersCount): Offer
    {
        $this->vendorOffersCount = $vendorOffersCount;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Offer
     */
    public function setPrice(float $price): Offer
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return Offer
     */
    public function setQuantity(int $quantity): Offer
    {
        $this->quantity = $quantity;
        return $this;
    }
}