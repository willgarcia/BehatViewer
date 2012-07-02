Feature: Profile

    @reset
    Scenario: Login with bad credentials
        Given I am a logged in user
          And I am on the homepage
          And I follow "Profile"
         Then I should be on "/profile"

        Given I fill in "username" with "viewer"
          And I press "Save"
         Then I should be on "/profile"