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
        /** @var $browser \jubianchi\BehatViewerBundle\Features\Context\BrowserContext */
        $browser = $this->getMainContext()->getSubcontext('browser');

        try {
            $browser->clickLink('Log in');

            return array(
                new Step\Given('I load the "user.sql" fixture'),
                new Step\Then('I fill in "username" with "behat"'),
                new Step\Then('I fill in "password" with "behat"'),
                new Step\Then('I press "Log in"'),
                new Step\Then('I should see "Logged in as behat"')
            );
        } catch (\Exception $e) {}
    }
}
