Feature: Load More Project Records
  In order to load more Project records
  As a user
  I need to be able to click the "Load More Projects" button

  Scenario: The user wants to load more Project records
    Given I am on the projects table page
    When I click the "Load More" button
    Then I see more Project records