<?php

namespace jubianchi\BehatViewerBundle\Features\Context;

use Behat\Mink\Exception,
    Behat\MinkExtension\Context\MinkContext,
    Behat\Mink\Exception\ExpectationException,
    jubianchi\BehatViewerBundle\Features\Context\BrowserContext,
    Behat\Behat\Context\Step;

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

    /**
     * @Then /^I should see an alert message with title "(?P<title>[^"]*)" and text "(?P<text>[^"]*)"$/
     */
    public function iShouldSeeAnAlertMessageWithTitleAndText($title, $text)
    {
        $alerts = $this->getMinkContext()->getSession()->getPage()->findAll('css', '.alert');

        if (count($alerts) < 1) {
            throw new Exception\ExpectationException(
				'No alert message found',
				$this->getMinkContext()->getSession()
			);
        }

        foreach ($alerts as $alert) {
            if (false !== strpos($alert->getText(), $text)) {
                $heads = $alert->findAll('css', '.alert-heading');

                foreach ($heads as $head) {
                    if ($head->getText() === $title) {
                        return;
                    }
                }
            }
        }

        throw new Exception\ExpectationException(
            sprintf(
                'No alert message found with title "%s" and text "%s"',
                $title,
                $text
            ),
            $this->getMinkContext()->getSession()
        );
    }
}
