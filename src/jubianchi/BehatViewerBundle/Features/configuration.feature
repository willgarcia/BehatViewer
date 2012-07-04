@project
Feature: Configuration

    @reset
    Scenario: First project
        Given I am a logged in user
          And I am on the homepage
          And I follow "Config"
         Then I should see an alert message with title "No project configured" and text "Before using Behat Viewer, you should configure your project."

        Given I fill in "Project name" with "Foo Bar"
          And I fill in "Identifier" with "foo-bar"
          And I fill in "Base URL" with "http://foo/bar"
          And I fill in "Root path" with "/foo/bar"
          And I fill in "Output path" with "/foo/bar"
          And I fill in "Test command" with "app/console foo bar"
          And I press "Save changes"
          And I should see "Behat Viewer [Foo Bar]"
          But I should not see "No project configured"
          And I should not see "Before using Behat Viewer, you should configure your project."

    @reset @javascript
    Scenario: First project with JS
        Given I am a logged in user
          And I am on the homepage
         Then I should see an alert message with title "No project configured" and text "Before using Behat Viewer, you should configure your project."

        Given I fill in "Project name" with "Foo Bar"
          And I fill in "Identifier" with "foo-bar"
          And I fill in "Base URL" with "http://foo/bar"
          And I fill in "Root path" with "/foo/bar"
          And I fill in "Output path" with "/foo/bar"
          And I fill in "Test command" with "app/console foo bar"
          And I press "Save changes"
         Then I should see "Settings were successfully saved"
          And I should see "Behat Viewer [Foo Bar]"
          And I should see "Settings were successfully saved."
          But I should not see "No project configured"
          And I should not see "Before using Behat Viewer, you should configure your project."
