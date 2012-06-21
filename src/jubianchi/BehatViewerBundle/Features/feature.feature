Feature: Feature page

    @reset @javascript
    Scenario: Navigation in features details
        Given I load the "single-project.sql" fixture
          And I load the "single-build.sql" fixture
          And I am on the homepage
          And I follow the 1st "Details" link
         Then I should see "Passed (#1 Built on 1970-01-01 at 00:00:00)"
          And I should see:
            """
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere mollis quam sed rhoncus. Lorem ipsum dolor sit amet, consectetur.
            """
          And I should see "Passed 3 step(s) / Passed: 3/3 (100%)"
          And I should see 3 ".alert-success" elements

        Given I follow "Failed"
         Then I should see "Failed (#1 Built on 1970-01-01 at 00:00:00)"
          And I should see:
            """
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere mollis quam sed rhoncus. Lorem ipsum dolor sit amet, consectetur.
            """
          And I should see "Failed 5 step(s) / Passed: 4/5 (80%) / Failed: 1/5 (20%)"
          And I should see 4 ".alert-success" elements
          And I should see 1 ".alert-danger" elements

    @reset @javascript
    Scenario: All step statuses
        Given I load the "single-project.sql" fixture
          And I load the "all-step-statuses.sql" fixture
          And I am on the homepage
          And I follow the 1st "Details" link
         Then I should see "All statuses (#1 Built on 1970-01-01 at 00:00:00)"
          And I should see "Scenario 5 step(s) / Passed: 1/5 (20%) / Failed: 1/5 (20%) / Skipped: 1/5 (20%) / Pending: 1/5 (20%) / Undefined: 1/5 (20%)"
          And I should see 1 ".alert-success" elements
          And I should see 2 ".alert-info" elements
          And I should see 1 ".alert-warning" elements
          And I should see 1 ".alert-danger" elements