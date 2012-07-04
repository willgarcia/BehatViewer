@build @feature @project
Feature: Homepage

    @reset @fixture:single-project.sql
    Scenario: Single project and no build
        Given I am on the homepage
         Then I should see "Behat Viewer [Foo Bar]"
          And I should see "Features"
          And I should see "No feature"
          And I should see "This project has not been built yet. Click on the build button to launch test suite."

    @fixture @fixture:single-build.sql
    Scenario: Homepage with some features
        Given I am on the homepage
         Then I should see "Features for Foo Bar"
          And I should see "Passed (100%)"
          And I should see "Failed (80%)"

    @reset @javascript @fixture:single-project.sql @fixture:single-build.sql
    Scenario: Some features displayed as a list with JS
        Given I am on the homepage
          And I follow "List view"
         Then I should see "Features for Foo Bar"
          And I should see a "table" element
          And the columns schema of the "table" table should match:
            | Columns Title |
            | Name          |
            | Completion    |
            | Progress      |
            | Details       |
            | Action        |
          And the data in the 1st row of the "table" table should match:
            | Name   | Completion | Progress | Details                             | Action    |
            | Failed | 80%        |          | Passed: 4/5 (80%) Failed: 1/5 (20%) | Details » |
          And the data in the 2nd row of the "table" table should match:
            | Name   | Completion | Progress | Details            | Action    |
            | Passed | 100%       |          | Passed: 3/3 (100%) | Details » |

    Scenario: Some features displayed as a list
        Given I am on the homepage
          And I follow "List view"
         Then I should see "Features for Foo Bar"
          And I should see a "table" element
          And the columns schema of the "table" table should match:
            | Columns Title |
            | Name          |
            | Completion    |
            | Progress      |
            | Details       |
            | Action        |
          And the data in the 1st row of the "table" table should match:
            | Name   | Completion | Progress | Details            | Action    |
            | Passed | 100%       |          | Passed: 3/3 (100%) | Details » |
          And the data in the 2nd row of the "table" table should match:
            | Name   | Completion | Progress | Details                             | Action    |
            | Failed | 80%        |          | Passed: 4/5 (80%) Failed: 1/5 (20%) | Details » |