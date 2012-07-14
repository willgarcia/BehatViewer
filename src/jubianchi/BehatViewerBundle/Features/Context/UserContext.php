<?php
namespace jubianchi\BehatViewerBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface,
    Behat\Behat\Context\Step;

class UserContext extends BehatViewerContext
{
    /**
     * @Given /^I am a logged in user$/
     */
    public function iAmALoggedInUser()
    {
        $this->iAmNotLoggedIn();

        return array(
            new Step\Given('I load the "user.sql" fixture'),
            new Step\Given('I am on "/login"'),
            new Step\Then('I fill in "username" with "behat"'),
            new Step\Then('I fill in "password" with "behat"'),
            new Step\Then('I press "Log in"'),
            new Step\Then('I should see "Logged in as behat"')
        );
    }

    /**
     * @Given /^I am not logged in$/
     */
    public function iAmNotLoggedIn()
    {
        /** @var $browser \jubianchi\BehatViewerBundle\Features\Context\BrowserContext */
        $browser = $this->getMainContext()->getSubcontext('browser');
        $browser->visit('/logout');
    }
}
