Feature: Main menu

    @menu
    Scenario: Main menu without Javascript
        Given I am on the homepage
         Then I should see "Behat Viewer [Foo Bar]"
          And I should see "Home"
          And I should see "History"
          And I should see "Definitions"
          And I should see "Config"

        Given I follow "Home"
         Then I should be on "/"

        Given I follow "History"
         Then I should be on "/history/"

	    Given I follow "Stats"
         Then I should be on "/stats/"

        Given I follow "Definitions"
         Then I should be on "/definitions/"

        Given I follow "Config"
         Then I should be on "/config/"