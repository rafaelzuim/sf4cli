<?php

namespace RafaelZuim\Sf4Cli\Controller\Console\Command;

use RafaelZuim\Sf4Cli\Dto\Offer;
use RafaelZuim\Sf4Cli\Service\Reader;
use RafaelZuim\Sf4Cli\Service\ReaderInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FindByPriceRange extends AbstractCommand
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:findby-price-range';

    protected function configure()
    {
        $this->setName('app:findby-price-range')
            ->addArgument('pricesFrom', InputArgument::REQUIRED, 'Bottom price for the offer.')
            ->addArgument('pricesTo', InputArgument::REQUIRED, 'Top price for the offer.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var ReaderInterface $readerService */
        $readerService = $this->getServiceManager()->get(Reader::class);

        $offers = $readerService->read('Some Input');
        $pricesFrom = (float)$input->getArgument('pricesFrom');
        $pricesTo = (float)$input->getArgument('pricesTo');

        foreach ($offers->getIterator() as $key => $offer) {
            /** @var Offer $offer */
            if ($offer->getPrice() >= $pricesFrom && $offer->getPrice() <= $pricesTo) {
                continue;
            }
            $offers->remove($key);
        }

        // TODO
        $output->writeln((string)$offers);
        return 0;
    }
}
