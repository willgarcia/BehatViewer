Feature: History

    @reset
    Scenario: Single project and no build
        Given I load the "single-project.sql" fixture
          And I am on "/"
          And I follow "History"
         Then I should see "Builds for Foo Bar"
	      And I should see "No build" in the ".alert" element
	      And I should see "This project has not been built yet. To build it, please run app/console behat-viewer:build foo-bar." in the ".alert" element

    Scenario: Single project and a single build
        Given I load the "single-build.sql" fixture
          And I am on "/"
          And I follow "History"
         Then I should see "Builds for Foo Bar"
          And I should see a "table" element
          And the columns schema of the "table" table should match:
            | Columns Title |
            |               |
            | #             |
            | Date          |
            | Completion    |
            | Progress      |
            | Details       |
            | Action        |
          And the data in the 1st row of the "table" table should match:
            |  | # | Date                    | Completion      | Progress | Details                                 | Action         |
            |  | 1 | 1970-01-01 00:00:00     | 87.5%           |          | Passed: 7/8 (87.5%) Failed: 1/8 (12.5%) | Details Delete |

    Scenario: With a second build
        Given I load the "second-build.sql" fixture
          And I am on "/"
          And I follow "History"
         Then I should see "Builds for Foo Bar"
          And I should see a "table" element
          And the data in the 1st row of the "table" table should match:
            |  | # | Date                    | Completion    | Progress | Details                                                    | Action         |
            |  | 2 | 1970-01-01 00:00:00     | 75%           |          | Passed: 6/8 (75%) Failed: 1/8 (12.5%) Skipped: 1/8 (12.5%) | Details Delete |
          And the data in the 2nd row of the "table" table should match:
            |  | # | Date                    | Completion      | Progress | Details                                 | Action         |
            |  | 1 | 1970-01-01 00:00:00     | 87.5%           |          | Passed: 7/8 (87.5%) Failed: 1/8 (12.5%) | Details Delete |

    @reset
    Scenario: Pagination
        Given I load the "single-project.sql" fixture
        Given I load the "many-builds.sql" fixture
          And I am on "/"
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