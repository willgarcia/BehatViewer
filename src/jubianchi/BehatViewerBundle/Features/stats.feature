Feature: Stats

    @reset
    Scenario: Single project and no build
  	    Given I load the "single-project.sql" fixture
	      And I am on "/stats"
         Then I should see "Stats for Foo Bar"
          And I should see "No build"
          And I should see "This project has not been built yet. To build it, please run app/console behat-viewer:build foo-bar."

    @javascript
    Scenario: Single project and no build with JS
	    Given I am on "/"
          And I follow "Stats"
         Then I should see "Stats for Foo Bar"
          And I should see a ".alert" element
          And I should see "No build"
          And I should see "This project has not been built yet. To build it, please run app/console behat-viewer:build foo-bar."