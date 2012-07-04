@build
Feature: History

    @reset @fixture:single-project.sql
    Scenario: Single project and no build
        Given I am on the homepage
          And I follow "History"
         Then I should see "Builds for Foo Bar"
	      And I should see an alert message with title "No build" and text "This project has not been built yet. To build it, please run app/console behat-viewer:build foo-bar."

    @fixture @fixture:single-build.sql
    Scenario: Single project and a single build
        Given I am on the homepage
          And I follow "History"
         Then I should see "Builds for Foo Bar"
          And I should see a "table" element
          And the columns schema of the "table" table should match:
            | Columns Title |
            | #             |
            | Date          |
            | Completion    |
            | Progress      |
            | Details       |
            | Action        |
          And the data in the 1st row of the "table" table should match:
            | # | Date                    | Completion      | Progress | Details                                 | Action  |
            | 1 | 1970-01-01 00:00:00     | 87.5%           |          | Passed: 7/8 (87.5%) Failed: 1/8 (12.5%) | Details |
          And I should not see "Delete selected"

    @fixture @fixture:second-build.sql
    Scenario: With a second build
        Given I am on the homepage
          And I follow "History"
         Then I should see "Builds for Foo Bar"
          And I should see a "table" element
          And the data in the 1st row of the "table" table should match:
            | # | Date                    | Completion    | Progress | Details                                                    | Action  |
            | 2 | 1970-01-01 00:00:00     | 75%           |          | Passed: 6/8 (75%) Failed: 1/8 (12.5%) Skipped: 1/8 (12.5%) | Details |
          And the data in the 2nd row of the "table" table should match:
            | # | Date                    | Completion      | Progress | Details                                 | Action  |
            | 1 | 1970-01-01 00:00:00     | 87.5%           |          | Passed: 7/8 (87.5%) Failed: 1/8 (12.5%) | Details |
          And I should not see "Delete selected"

    Scenario: Builds list as a logged in user
        Given I am a logged in user
          And I am on the homepage
          And I follow "History"
         Then I should see "Builds for Foo Bar"
          And I should see a "table" element
          And the data in the 1st row of the "table" table should match:
            |  | # | Date                    | Completion    | Progress | Details                                                    | Action         |
            |  | 2 | 1970-01-01 00:00:00     | 75%           |          | Passed: 6/8 (75%) Failed: 1/8 (12.5%) Skipped: 1/8 (12.5%) | Details Delete |
          And the data in the 2nd row of the "table" table should match:
            |  | # | Date                    | Completion      | Progress | Details                                 | Action         |
            |  | 1 | 1970-01-01 00:00:00     | 87.5%           |          | Passed: 7/8 (87.5%) Failed: 1/8 (12.5%) | Details Delete |
          And I should see "Delete selected"

    @reset @fixture:single-project.sql @fixture:many-builds.sql
    Scenario: Pagination
        Given I am on the homepage
          And I follow "History"
         Then I should see a ".prev.disabled" element
          And I should see a ".next" element

        Given I follow "Next"
         Then I should see "Page 2/3"
          And I should see a ".prev" element
          And I should see a ".next" element

        Given I follow "Next"
         Then I should see "Page 3/3"
          And I should see a ".prev" element
          And I should see a ".next.disabled" element

        Given I follow "Previous"
         Then I should see "Page 2/3"

        Given I follow "Previous"
         Then I should see "Page 1/3"

    @reset @javascript @fixture:single-project.sql @fixture:single-build.sql @fixture:second-build.sql
    Scenario: Delete build
      Given I am a logged in user
        And I follow "History"
        And the data in the 1st row of the "table" table should match:
          |  | # | Date                               | Completion | Progress | Details                                                    | Action         |
          |  | 2 | 43 years ago (1970-01-01 00:00:00) | 75%        |          | Passed: 6/8 (75%) Failed: 1/8 (12.5%) Skipped: 1/8 (12.5%) | DetailsDelete |
        And the data in the 2nd row of the "table" table should match:
          |  | # | Date                               | Completion | Progress | Details                                 | Action         |
          |  | 1 | 43 years ago (1970-01-01 00:00:00) | 87.5%      |          | Passed: 7/8 (87.5%) Failed: 1/8 (12.5%) | DetailsDelete |
        And I click on the 1st "Delete" link
       Then the data in the 1st row of the "table" table should match:
          |  | # | Date                               | Completion | Progress | Details                                 | Action         |
          |  | 1 | 43 years ago (1970-01-01 00:00:00) | 87.5%      |          | Passed: 7/8 (87.5%) Failed: 1/8 (12.5%) | DetailsDelete |
