Feature: Definitions

    @reset
    Scenario: Single project and no definition
        Given I load the "single-project.sql" fixture
          And I am on the homepage
          And I follow "Definitions"
         Then I should see "Definitions for Foo Bar"
          And I should see an alert message with title "No definitions" and text "No step definition found. To load definitions from your context library, please run app/console behat-viewer:definitions foo-bar"

    Scenario: Single project and and step definitions
        Given I load the "definitions-set.sql" fixture
          And I am on the homepage
          And I follow "Definitions"
         Then I should see "Definitions for Foo Bar"
          And I should see a "table" element
          And the columns schema of the "table" table should match:
            | Columns Title |
            | Step          |
            | Context       |
            | Description   |