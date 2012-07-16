<?php

namespace jubianchi\BehatViewerBundle\Features\Context;

use Behat\MinkExtension\Context\MinkContext,
    Behat\Mink\Exception\ExpectationException,
    Behat\Gherkin\Node\PyStringNode,
    Behat\Symfony2Extension\Context\KernelAwareInterface,
    Symfony\Component\HttpKernel\KernelInterface,
    Behat\Behat\Context\Step,
    Behat\Mink\Exception\ElementNotFoundException;

class BrowserContext extends MinkContext implements KernelAwareInterface
{
    protected $parameters;

    public function __construct(array $parameters = array())
    {
        $this->parameters = $parameters;
    }

    /**
     * @var \Symfony\Component\HttpKernel\KernelInterface
     */
    protected $kernel;

    public function setKernel(KernelInterface $kernel)
    {
      $this->kernel = $kernel;
    }

    /**
     * @BeforeScenario @reset @javascript
     */
    public function BeforeScenarioReset()
    {
        $this->getSession()->reset();
    }

    /**
     * @BeforeScenario @restart @javascript
     */
    public function BeforeScenarioRestart()
    {
        $this->getSession()->restart();
    }

    /**
     * @Given /^I (?:do not|don't) follow (?:|the )(?:redirects?|redirections?)$/
     */
    public function iDoNotFollowRedirects()
    {
        $client = $this->getSession()->getDriver()->getClient();
        $client->followRedirects(false);
    }

    /**
     * @When /^I follow (?:|the )(?:redirects?|redirections?)?$/
     */
    public function iFollowRedirects()
    {
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

        if (!isset($nodes[$index - 1])) {
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

        if (sizeof($nodes) === 0) {
            throw new ExpectationException(sprintf('The image with alternative text "%s" was not found', $image), $this->getSession());
        }
    }

    /**
     * @Then /^I should see:$/
     */
    public function iShouldSee(PyStringNode $string)
    {
        $this->assertPageContainsText((string) $string);
    }

    /**
     * @Then /^I should see a "(?P<button>[^"]*)" button$/
     */
    public function iShouldSeeButton($button)
    {
        $this->getSession()->getPage()->findButton($button);
    }

    /**
     * @Then /^I should not see a "(?P<button>[^"]*)" button$/
     */
    public function iShouldNotSeeButton($button)
    {
        try {
            $this->getSession()->getPage()->findButton($button);
            throw new ExpectationException('Button ' . $button . 'was found on page', $this->getSession());
        } catch (\Exception $e) {}
    }

    /**
     * @Given /^I am on the homepage$/
     */
    public function iAmOnTheHomepage()
    {
        return new Step\Given(sprintf('I am on "%s"', $this->parameters['base_url']));
    }

    /**
     * @Then /^The value of the "(?P<field>(?:[^"]|\\")*)" field should be "(?P<value>(?:[^"]|\\")*)"$/
     */
    function theFieldValueShouldBe($field, $value)
    {
        $field = $this->getSession()->getPage()->find('named', array(
            'field', $this->getSession()->getSelectorsHandler()->xpathLiteral($field)
        ));

        if (null === $field) {
            throw new ElementNotFoundException(
                $this->getSession(), 'form field', 'id|name|label|value', $field
            );
        }

        if ($value !== $field->getValue()) {
            $message = sprintf('Expected %s as the field value but got %s', $value, $field->getValue());
            throw new ExpectationException($message, $this->getSession());
        }
    }
}
