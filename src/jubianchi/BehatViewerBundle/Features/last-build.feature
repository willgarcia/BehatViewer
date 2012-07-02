Feature: Last build notification

    @reset @javascript @fixture:single-project.sql @fixture:single-build.sql
    Scenario: Last build notification
        Given I am on the homepage
         Then I should not see "Last build"

        Given I load the "second-build.sql" fixture
          And I follow "Home"
         Then I should see "Last build"
