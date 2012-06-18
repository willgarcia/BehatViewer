Feature: Homepage

    @reset
    Scenario: Single project and no build
        Given I load the "single-project.sql" fixture
          And I am on "/"
         Then I should see "Behat Viewer [Foo Bar]"
          And I should see "Features"
          And I should see "No feature"
          And I should see "This project has not been built yet. Click on the build button to launch test suite."

    Scenario: Display switch
        Given I am on "/"
         Then I should see "Switch view"
          And I should see "List"
          And I should see "Dashboard"

        Given I follow "List"
         Then I should be on "/list"

        Given I follow "Dashboard"
         Then I should be on "/thumb"

    Scenario: Display settings stored in session
        Given I am on "/"
         Then I should see "Switch view"

        Given I follow "List"
         Then I should be on "/list"
         Then I follow "History"
          And I follow "Home"
         Then I should be on "/"

    @javascript
    Scenario: Display switch with JS
        Given I am on "/"
         Then I should see "Switch view"
          And I should not see "List"
          And I should not see "Dashboard"

        Given I follow "List"
         Then I should be on "/#!/list"

        Given I follow "Dashboard"
         Then I should be on "/#!/thumb"

    @javascript
    Scenario: Display settings stored in session with JS
        Given I am on "/"
         Then I should see "Switch view"
          And I should not see "List"
          And I should not see "Dashboard"

         Then I should be on "/#!/list"
          And I follow "History"
          And I follow "Home"
         Then I should be on "/#!/"

    Scenario: Homepage with some features
        Given I load the "single-build.sql" fixture
          And I am on "/"
         Then I should see "Features for Foo Bar"
          And I should see "Passed (100%)"
          And I should see "Failed (80%)"

    @reset @javascript
    Scenario: Some features displayed as a list with JS
        Given I load the "single-project.sql" fixture
          And I load the "single-build.sql" fixture
          And I am on "/"
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
        Given I am on "/"
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