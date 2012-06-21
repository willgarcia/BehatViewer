Feature: All pages

    @reset
    Scenario Outline: Without data
        Given am on "<url>"
         Then the response status code should be <status>
          And I should see "Project configuration"
          And I should see an alert message with title "No project configured" and text "Before using Behat Viewer, you should configure your project."

          Examples:
            | url                   | status |
            | /                     | 200    |
            | /history              | 200    |
            | /stats                | 200    |
            | /definitions          | 200    |
            | /config               | 200    |
            | /feature/5/foo        | 200    |
            | /feature/5/foo/source | 200    |
            | /thumb                | 200    |
            | /list                 | 200    |

    @reset
    Scenario Outline: With data
        Given I load the "single-project.sql" fixture
          And I load the "single-build.sql" fixture
          And I am on "<url>"
         Then the response status code should be <status>
          And I should not see "No project configured"
          And I should not see "Before using Behat Viewer, you should configure your project."

          Examples:
            | url                   | status |
            | /                     | 200    |
            | /history              | 200    |
            | /stats                | 200    |
            | /definitions          | 200    |
            | /config               | 200    |
            | /feature/5/foo        | 404    |
            | /feature/5/foo/source | 404    |
            | /tag/bar              | 404    |
            | /thumb                | 200    |
            | /list                 | 200    |