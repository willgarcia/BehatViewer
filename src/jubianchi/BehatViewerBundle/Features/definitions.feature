@project
Feature: Definitions

    @reset @fixture:single-project.sql
    Scenario: Single project and no definition
        Given I am on the homepage
          And I follow "Definitions"
         Then I should see "Definitions for Foo Bar"
          And I should see an alert message with title "No definitions" and text "No step definition found. To load definitions from your context library, please run app/console behat-viewer:definitions foo-bar"

    @javascript @fixture @fixture:definitions-set.sql
    Scenario: Single project and and step definitions
        Given I am on the homepage
          And I follow "Definitions"
         Then I should see "Definitions for Foo Bar"
          And I should see a "table" element
          And the columns schema of the "table" table should match:
            | Columns Title |
            | Step          |
            | Context       |
            | Description   |