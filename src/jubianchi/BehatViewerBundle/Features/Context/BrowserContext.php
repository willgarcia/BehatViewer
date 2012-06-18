<?php

namespace jubianchi\BehatViewerBundle\Features\Context;

use \Behat\MinkExtension\Context\MinkContext,
    \Behat\Mink\Exception\ExpectationException,
    \Behat\Gherkin\Node\PyStringNode,
    \Behat\Symfony2Extension\Context\KernelAwareInterface,
    \Symfony\Component\HttpKernel\KernelInterface;

class BrowserContext extends MinkContext implements KernelAwareInterface
{
    /**
     * @var \Symfony\Component\HttpKernel\KernelInterface
     */
    protected $kernel;

    public function setKernel(KernelInterface $kernel)
    {
      $this->kernel = $kernel;
    }

    /**
     * @Given /^I (?:do not|don't) follow (?:|the )(?:redirects?|redirections?)$/
     */
    public function iDoNotFollowRedirects()
    {
        $this->canIntercept();
        $client = $this->getSession()->getDriver()->getClient();
        $client->followRedirects(false);
    }

    /**
     * @When /^I follow (?:|the )(?:redirects?|redirections?)?$/
     */
    public function iFollowRedirects()
    {
        $this->canIntercept();
        $client = $this->getSession()->getDriver()->getClient();
        $client->followRedirects(true);
        $client->followRedirect();
    }

    /**
     * @Given /^I (?:follow|click on) the (?P<index>\d+)(?P<suffix>st|nd|rd|th) "(?P<link>[^"]*)" link$/
     */
    public function iFollowTheNthLink($index, $suffix, $link)
    {
        $link = str_replace('\\"', '"', $link);
        $nodes = $this->getSession()->getPage()->findAll(
            'named',
            array(
                'link',
                $this->getSession()->getSelectorsHandler()->xpathLiteral($link)
            )
        );

        if(!isset($nodes[$index - 1])) {
            throw new ExpectationException(sprintf('The %d%s link with id|name|label|value "%s" was not found', $index, $suffix, $link), $this->getSession());
        }

        $nodes[$index - 1]->click();
    }

    /**
     * @Then /^I should see an image named "(?P<image>[^"]*)"$/
     */
    public function iShouldSeeImageNamed($image)
    {
        $image = str_replace('\\"', '"', $image);
        $nodes = $this->getSession()->getPage()->findAll('css', 'img[alt="' . $image . '"]');

        if(sizeof($nodes) === 0) {
            throw new ExpectationException(sprintf('The image with alternative text "%s" was not found', $image), $this->getSession());
        }
    }

    /**
     * @Then /^I should see:$/
     */
    public function iShouldSee(PyStringNode $string)
    {
        $this->assertPageContainsText((string)$string);
    }
}
