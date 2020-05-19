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
                new Offer(new \DateTime('now'), 1, 3.30, rand(1,100)),
                new Offer(new \DateTime('2020-07-16'), 12, 14.30, rand(1,100)),
                new Offer(new \DateTime('2020-05-30'), 13, 7.30, rand(1,100)),
                new Offer(new \DateTime('2020-06-05'), 35, 6.30, rand(1,100)),
                new Offer(new \DateTime('2020-06-10'), 78, 3.80, rand(1,100)),
                new Offer(new \DateTime('2020-12-25'), 1, 3.90, rand(1,100)),
                new Offer(new \DateTime('2020-12-25'), 45, 7.80, rand(1,100)),
                new Offer(new \DateTime('2020-10-10'), 93, 123.40, rand(1,100)),
                new Offer(new \DateTime('2020-09-15'), 14, 25.80, rand(1,100)),
                new Offer(new \DateTime('2020-12-01'), 10, 36.80, rand(1,100)),
            ]
        );
    }
}