Feature: Genus
  In order to know everything about Genus
  As an application user
  I need to be able to use the genus pages

  Scenario: Show homepage
    Given I am on "/"
    Then I should see "index"

  Scenario: Show genus
    Given I am on "/genus/salmon"
    Then I should see "Genus: salmon"
    And I should not see "Octopus asked me a riddle, outsmarted me"

  Scenario: Show notes for genus octopus
    Given I am on "/genus/octopus"
    Then I should see "Genus: octopus"
    And I should see "Octopus asked me a riddle, outsmarted me"

  Scenario: Show genus in page title
    Given I am on "/genus/octopus"
    Then I should see "Genus: octopus" in the "title" element
