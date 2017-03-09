Feature: Genus
  In order to know everything about Genus
  As an application user
  I need to be able to use the genus pages

  Scenario: Show homepage
    Given I am on "/"
    Then I should see "index"

  @javascript
  Scenario: Show notes for genus octopus
    Given I am on "/genus/octopus"
    And I wait for the notes to load
    Then I should see "octopus"
    And I should see "Octopus asked me a riddle, outsmarted me"

  Scenario: Show genus in page title
    Given I am on "/genus/octopus"
    Then I should see "Genus octopus" in the "title" element

  Scenario: Show Fun Fact
    Given I am on "/genus/octopus"
    Then I should see "Octopuses can change the color of their body in just three-tenths of a second!"

  Scenario: Show correct Known Species number format
    Given I am on "/genus/octopus"
    Then I should see "99.999"
    And I should not see "99,999"
