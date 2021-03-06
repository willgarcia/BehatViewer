Feature: Stats

    @reset
    Scenario: Single project and no build
  	    Given I load the "single-project.sql" fixture
	      And I am on the homepage
          And I follow "Stats"
         Then I should see "Stats for Foo Bar"
          And I should see an alert message with title "No build" and text "This project has not been built yet. To build it, please run app/console behat-viewer:build foo-bar."