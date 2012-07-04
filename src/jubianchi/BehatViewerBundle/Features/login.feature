@user
Feature: Login

    @reset
    Scenario: Login with bad credentials
        Given I am on the homepage
          And I follow "Log in"
          And I press "Log in"
         Then I should see "Bad credentials"

        Given I fill in "username" with "foo"
          And I fill in "password" with "bar"
          And I press "Log in"
         Then I should see "Bad credentials"

    @fixture @fixture:user.sql
    Scenario: Login with existing credentials
        Given I am on the homepage
          And I follow "Log in"
         Then I fill in "username" with "behat"
          And I fill in "password" with "behat"
          And I press "Log in"
         Then I should not see "Bad credentials"
          And I should be on "/"
          And I should see "Logged in as behat"
          And I should see "Profile"
          And I should see "Logout"

    Scenario: Login with existing credentials
        Given I am on the homepage
          And I follow "Logout"
         Then I should be on "/"
          And I should see "Login"
