<?php

namespace RafaelZuim\Sf4Cli\Dto;

use IteratorAggregate;
use ArrayIterator;
use Countable;

class OfferCollection implements IteratorAggregate, Countable
{
    public CONST DEFAULT_LENGHT = 1;

    /** @var array|Offer[] */
    private $dtos = [];

    /**
     * OfferCollection constructor.
     * @param array|[] Offer $dtos
     */
    public function __construct($dtos = [])
    {
        foreach ($dtos as $dto) {
            !($dto instanceof Offer) ?: $this->add($dto);
        }
    }

    /**
     * @param Offer $dto
     * @return $this
     */
    public function add(Offer $dto): self
    {
        $this->dtos[] = $dto;
        return $this;
    }

    public function remove(int $index): void
    {
        if (sizeof($this->dtos) > 0 && sizeof($this->dtos) >= --$index) {
            array_splice($this->dtos, $index, self::DEFAULT_LENGHT);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->dtos);
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->dtos);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->dtos);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function __toString()
    {
        $output = '';
        foreach ($this->getIterator() as $offer) {
            /** @var Offer $offer */
            $output .= \sprintf("Date.: %s", $offer->getCreatedAt()->format("d.m.Y H:i:s")) . PHP_EOL;
            $output .= \sprintf("Price.: %s", $offer->getPrice()) . PHP_EOL;
            $output .= \sprintf("Quantity.: %s", $offer->getQuantity()) . PHP_EOL;
            $output .= \sprintf("VendorOffersCount.: %s", $offer->getVendorOffersCount()) . PHP_EOL;
            $output .= "===================================" . PHP_EOL;
        }
        return $output;
    }


}
