<?php

namespace jubianchi\BehatViewerBundle\Features\Context;

use \Behat\MinkExtension\Context\MinkContext,
    \Behat\Mink\Exception\ExpectationException,
    \jubianchi\BehatViewerBundle\Features\Context\BrowserContext,
    \Behat\Behat\Context\Step;

class BootstrapMessageContext extends BehatViewerContext
{
    public function getMinkContext()
    {
        return $this->getMainContext()->getSubContext('browser');
    }

    /**
     * @Then /^I should see an alert message$/
     */
    public function iShouldSeeAnAlertMessage()
    {
        return new Step\Then('I should see a ".alert" element');
    }
}
