Feature: Last build notification

    @reset @javascript
    Scenario: Last build notification
        Given I load the "single-project.sql" fixture
          And I load the "single-build.sql" fixture
          And I am on "/"
         Then I should not see "Last build"

        Given I load the "second-build.sql" fixture
          And I follow "Home"
         Then I should see "Last build"
