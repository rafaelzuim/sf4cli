<?php

namespace RafaelZuim\Sf4CliTest\Service;

use Laminas\ServiceManager\ServiceManager;
use PHPUnit\Framework\TestCase;
use RafaelZuim\Sf4Cli\Dto\Offer;
use RafaelZuim\Sf4Cli\Service\InvokableFactory;
use RafaelZuim\Sf4Cli\Service\Reader;

class ReaderTest extends TestCase
{
    /** @var Reader */
    private $readerService;

    private $serviceManager;

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

        $this->readerService = $this->serviceManager->get(Reader::class);
    }

    /**
     * @throws \Exception
     */
    public function testReadData()
    {
        $data = $this->readerService->read('some_url');
        $this->assertContainsOnlyInstancesOf(Offer::class,$data);
    }
}
