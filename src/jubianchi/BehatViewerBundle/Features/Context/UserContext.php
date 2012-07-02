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
        $driver = $this->getMainContext()->getSubcontext('browser')->getSession()->getDriver();

        if($driver instanceof Behat\Mink\Driver\GoutteDriver) {
            return array(
                new Step\Given('I load the "user.sql" fixture'),
                new Step\Given('I am on "/login"'),
                new Step\Then('I fill in "username" with "behat"'),
                new Step\Then('I fill in "password" with "behat"'),
                new Step\Then('I press "Log in"')
            );
        } else {
            return array(
                new Step\Given('I load the "user.sql" fixture'),
                new Step\Given('I am on the homepage'),
                new Step\Given('I follow "Log in"'),
                new Step\Then('I fill in "username" with "behat"'),
                new Step\Then('I fill in "password" with "behat"'),
                new Step\Then('I press "Log in"'),
                new Step\Then('I wait 1 second')
            );
        }
    }
}
