<?php


namespace RafaelZuim\Sf4Cli\Controller\Console\Command;


use Laminas\ServiceManager\ServiceManager;
use RafaelZuim\Sf4Cli\Service\InvokableFactory;
use RafaelZuim\Sf4Cli\Service\Reader;
use RafaelZuim\Sf4Cli\Service\ReaderInterface;
use Symfony\Component\Console\Command\Command;

class AbstractCommand extends Command
{

    private $serviceManager;

    /**
     * AbstractCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->serviceManager = new ServiceManager(
            [
                'services' => [],
                'invokables' => [],
                'factories' => [
                    Reader::class => InvokableFactory::class
                ],
                'abstract_factories' => [],
                'delegators' => [],
                'aliases' => [],
                'initializers' => [],
                'lazy_services' => [],
                'shared' => [],
                'shared_by_default' => true,
            ]
        );
    }

    /**
     * @return ServiceManager
     */
    public function getServiceManager(): ServiceManager
    {
        return $this->serviceManager;
    }

}