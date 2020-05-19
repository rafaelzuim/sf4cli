#!/usr/bin/env php
<?php
// application.php

require_once 'vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();

// todo Create a auto loader somehow to load all commands within Console\Command folder
$application->add(new \RafaelZuim\Sf4Cli\Controller\Console\Command\FindByTimeRange());
$application->add(new \RafaelZuim\Sf4Cli\Controller\Console\Command\FindByPriceRange());

$application->run();