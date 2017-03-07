Feature: Genus
  In order to know everything about Genus
  As an application user
  I need to be able to use the genus pages

  @javascript
  Scenario: Show genus
    Given I am on "/genus"
    Then I should see "Under the sea!"