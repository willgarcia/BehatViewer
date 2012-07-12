@navigation
Feature: Main menu

    Scenario: Main menu without data
        Given I am on the homepage
         Then I should see "Behat Viewer"
          And I should see "Home"
          And I should see "History"
          And I should see "Definitions"
          And I should not see "Config"
          And I should see "Help"

        Given I follow "Home"
         Then I should be on "/config/"

        Given I follow "History"
         Then I should be on "/config/"

	    Given I follow "Stats"
         Then I should be on "/config/"

        Given I follow "Definitions"
         Then I should be on "/config/"

        Given I follow "Help"
         Then I should be on "/help"

    @reset
    Scenario: Main menu without data as a logged in user
        Given I am a logged in user
          And I am on the homepage
         Then I should see "Behat Viewer"
          And I should see "Home"
          And I should see "History"
          And I should see "Definitions"
          And I should see "Config"
          And I should see "Help"

        Given I follow "Config"
         Then I should be on "/config/"