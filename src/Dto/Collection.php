<?php

namespace RafaelZuim\Sf4Cli;

use IteratorAggregate;
use ArrayIterator;
use Countable;

class OfferCollection implements IteratorAggregate, Countable
{
    /** @var object[] */
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
    public function add(Offer $dto) : self
    {
        $this->dtos[] = $dto;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator() : ArrayIterator
    {
        return new ArrayIterator($this->dtos);
    }

    /**
     * @return bool
     */
    public function isEmpty() : bool
    {
        return empty($this->dtos);
    }

    /**
     * @return int
     */
    public function count() : int
    {
        return count($this->dtos);
    }
}
