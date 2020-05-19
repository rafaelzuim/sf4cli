<?php

namespace RafaelZuim\Sf4Cli\Controller\Console\Command;

use RafaelZuim\Sf4Cli\Dto\Offer;
use RafaelZuim\Sf4Cli\Service\Reader;
use RafaelZuim\Sf4Cli\Service\ReaderInterface;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FindByTimeRange extends AbstractCommand
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:findby-time-range';

    protected function configure()
    {
        $this->setName(static::$defaultName)
            ->addArgument('dateFrom', InputArgument::REQUIRED, 'Offers starting on: (Eg.: 01.01.2020)')
            ->addArgument('dateTo', InputArgument::REQUIRED, 'Offers ending on:  (Eg.: 01.01.2020)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var ReaderInterface $readerService */
        $readerService = $this->getServiceManager()->get(Reader::class);

        $offers = $readerService->read('Some Input');
        $dateFrom = \DateTime::createFromFormat('d.m.Y', $input->getArgument('dateFrom'));
        $dateTo = \DateTime::createFromFormat('d.m.Y', $input->getArgument('dateTo'));

        if (!$dateFrom || !$dateTo) {
            $output->write('Invalid date period try one like (01.01.2020)');
        }

        $output->writeln(
            \sprintf(
                "Searching foor offers in a time period from %s to %s.",
                $dateFrom->format('d.m.Y'),
                $dateTo->format('d.m.Y')
            )
        );

        $resultArray = [];

        foreach ($offers->getIterator() as $key => $offer) {
            /** @var Offer $offer */
            if ($offer->getCreatedAt()->getTimestamp() >= $dateFrom->getTimestamp() && $offer->getCreatedAt(
                )->getTimestamp() <= $dateTo->getTimestamp() && $offer->getQuantity() > 0) {
                $resultArray [] = $offer;
            }
        }
        $offers->setDto($resultArray);
        $output->writeln((string)$offers);
        return 0;
    }
}
