@navigation
Feature: All pages

    @reset
    Scenario Outline: Without data
        Given am on "<url>"
         Then the response status code should be <status>
          And I should see "Login"

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

    @reset @fixture:single-project.sql @fixture:single-build.sql
    Scenario Outline: With data
        Given I am on "<url>"
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