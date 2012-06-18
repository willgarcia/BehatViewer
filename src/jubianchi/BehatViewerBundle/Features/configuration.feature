Feature: Configuration

    @reset
    Scenario: First project
        Given I am on "/config/"
         Then I should see a ".alert" element
          And I should see "No project configured"
          And I should see "Before using Behat Viewer, you should configure your project."

        Given I fill in "Project name" with "Foo Bar"
          And I fill in "Identifier" with "foo-bar"
          And I fill in "Base URL" with "http://foo/bar"
          And I fill in "Root path" with "/foo/bar"
          And I fill in "Output path" with "/foo/bar"
          And I fill in "Test command" with "app/console foo bar"
          And I press "Save changes"
         Then I should be on "/config/"
          And I should see "Behat Viewer [Foo Bar]"
          But I should not see "No project configured"
          And I should not see "Before using Behat Viewer, you should configure your project."

    @reset @javascript
    Scenario: First project with JS
        Given I am on "/"
         Then I should see a ".alert" element
          And I should see "No project configured"
          And I should see "Before using Behat Viewer, you should configure your project."

        Given I fill in "Project name" with "Foo Bar"
          And I fill in "Identifier" with "foo-bar"
          And I fill in "Base URL" with "http://foo/bar"
          And I fill in "Root path" with "/foo/bar"
          And I fill in "Output path" with "/foo/bar"
          And I fill in "Test command" with "app/console foo bar"
          And I press "Save changes"
         Then I should be on "/#!/config/"
          And I should see "Behat Viewer [Foo Bar]"
          And I should see "Settings were successfully saved."
          But I should not see "No project configured"
          And I should not see "Before using Behat Viewer, you should configure your project."
