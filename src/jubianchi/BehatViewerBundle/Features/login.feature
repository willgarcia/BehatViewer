@user
Feature: Login

    @reset @fixture:user.sql
    Scenario: Login with bad credentials
        Given I am on the homepage
          And I follow "Log in"
          And I press "Log in"
         Then I should see "Bad credentials"

        Given I fill in "username" with "foo"
          And I fill in "password" with "bar"
          And I press "Log in"
         Then I should see "Bad credentials"

    @javascript
    Scenario: Login with existing credentials
        Given I am not logged in
          And I am on the homepage
          And I follow "Log in"
          And I fill in "username" with "behat"
          And I fill in "password" with "behat"
          And I press "Log in"
         Then I should be on "/config/"
          And I should see "Logged in as behat"

        Given I follow "Logged in as behat"
         Then I should see "Profile"
          And I should see "Projects"
          And I should see "Config"
          And I should see "Logout"

    @javascript
    Scenario: Logout
        Given I am on the homepage
          And I follow "Logged in as behat"
          And I follow "Logout"
         Then I should be on "/login"

    @reset @javascript @fixture:single-project.sql @fixture:single-build.sql
    Scenario: Logout
        Given I am a logged in user
          And I am on the homepage
          And I follow "Logged in as behat"
          And I follow "Logout"
         Then I should be on "/"
