@user
Feature: Profile

    @reset
    Scenario: Edit profile
        Given I am a logged in user
          And I am on the homepage
          And I follow "Logged in as behat"
          And I follow "Profile"
         Then I should be on "/profile"

        Given I fill in "Username" with "viewer"
          And I press "Save changes"
         Then I should be on "/profile"
          And I should see "Logged in as viewer"

        Given I fill in "Username" with "behat"
          And I fill in "Email" with "behat@viewer.com"
          And I press "Save changes"
         Then I should be on "/profile"
          And I should see "behat@viewer.com"