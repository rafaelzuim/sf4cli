<?php

namespace RafaelZuim\Sf4Cli\Controller\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FindByTimeRange extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:findby-time-range';

    protected function configure()
    {
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // TODO
        $output->writeln("Find By TIME RANGE console");
        return 0;
    }
}
