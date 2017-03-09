Feature: Main
  In order to see the homepage
  As an application user
  I need to be able to see the homepage

  Scenario: Show homepage
    Given I am on "/"
    Then I should see "Welcome Aquanauts!"
