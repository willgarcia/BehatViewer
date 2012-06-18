<?php
namespace jubianchi\BehatViewerBundle\Features\Context;

use \Symfony\Bundle\FrameworkBundle\Command\CacheClearCommand,
    \Behat\Behat\Event\SuiteEvent,
    \Symfony\Component\HttpKernel\KernelInterface;

class FeatureContext extends BehatViewerContext
{
    public function __construct()
    {
        $this->useContext('fixture', new FixtureContext());
        $this->useContext('browser', new BrowserContext());
        $this->useContext('table', new TableContext());
    }

    public function setKernel(KernelInterface $kernel)
    {
        parent::setKernel($kernel);

        foreach($this->getSubcontexts() as $context) {
            $context->setKernel($kernel);
        }
    }

    /**
     * @Given /^I wait (?P<delay>\d+) seconds?$/
     */
    public function iWait($delay)
    {
        sleep($delay);
    }

}
