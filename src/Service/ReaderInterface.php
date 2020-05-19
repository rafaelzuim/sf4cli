<?php


namespace RafaelZuim\Sf4Cli\Service;


use RafaelZuim\Sf4Cli\Dto\OfferCollection;

interface ReaderInterface
{
    /**
     * Read in incoming data and parse to objects
     *
     * @param string $input
     * @return OfferCollection
     */
    public function read(string $input): OfferCollection;
}