<?php
namespace jubianchi\BehatViewerBundle\Features\Context;

use Symfony\Bundle\FrameworkBundle\Command\CacheClearCommand,
    Behat\Behat\Event\SuiteEvent,
    Symfony\Component\HttpKernel\KernelInterface;

class FeatureContext extends BehatViewerContext
{
    public function __construct(array $parameters = array())
    {
        parent::__construct($parameters);

        $this->useContext('fixture', new FixtureContext($parameters));
        $this->useContext('browser', new BrowserContext($parameters));
        $this->useContext('table', new TableContext($parameters));
        $this->useContext('message', new BootstrapMessageContext($parameters));
        $this->useContext('user', new UserContext($parameters));
    }

    public function setKernel(KernelInterface $kernel)
    {
        parent::setKernel($kernel);

        foreach ($this->getSubcontexts() as $context) {
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

    /**
     * Pauses the scenario until the user presses a key. Usefull when debugging a scenario.
     *
     * @Then /^(?:|I )put a breakpoint$/
     */
    public function iPutABreakpoint()
    {
        fwrite(STDOUT, "\033[s    \033[93m[Breakpoint] Press \033[1;93m[RETURN]\033[0;93m to continue...\033[0m");
        while (fgets(STDIN, 1024) == '') {}
        fwrite(STDOUT, "\033[u");

        return;
    }

}
