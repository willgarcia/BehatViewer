@navigation
Feature: Main menu

    @reset
    Scenario: Main menu links
        Given I am on the homepage
         Then I should see "Behat Viewer"
          And I should see "Home"
          And I should see "History"
          And I should see "Definitions"
          And I should not see "Config"
          And I should see "Help"

    Scenario Outline: Navigation without data
        Given I am on the homepage
          And I follow "<link>"
         Then I should be on "<url>"

        Examples:
            | link        | url    |
            | Home        | /login |
            | History     | /login |
            | Stats       | /login |
            | Definitions | /login |
            | Help        | /help  |