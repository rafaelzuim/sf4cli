#!/usr/bin/env php
<?php
// application.php

require_once 'vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();

// ... register commands

$application->add(new \RafaelZuim\Sf4Cli\Controller\Console\Command\FindByTimeRange());
$application->add(new \RafaelZuim\Sf4Cli\Controller\Console\Command\FindByPriceRange());

$application->run();