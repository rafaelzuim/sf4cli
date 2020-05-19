<?php


namespace RafaelZuim\Sf4Cli\Service;


use RafaelZuim\Sf4Cli\Dto\Offer;
use RafaelZuim\Sf4Cli\Dto\OfferCollection;

class Reader implements ReaderInterface
{
    /**
     * @param string $input
     * @return OfferCollection
     * @throws \Exception
     */
    public function read(string $input): OfferCollection
    {
        // TODO: Implement read() method.
        return $this->mockData();
    }

    private function mockData() : OfferCollection
    {
        return new OfferCollection(
            [
                new Offer(new \DateTime('now'), 1, 3.30, 100),
                new Offer(new \DateTime('now'), 12, 14.30, 80),
                new Offer(new \DateTime('now'), 13, 7.30, 25),
                new Offer(new \DateTime('now'), 14, 6.30, 23),
                new Offer(new \DateTime('now'), 15, 3.80, 1),
            ]
        );
    }
}