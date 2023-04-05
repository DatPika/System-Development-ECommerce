Feature: Global Search
  In order to perform a global search for records
  As a user
  I need to be able to input into the "search" field and press the "Search" button

  Scenario: The user wants to perform a global search
    Given I am on the home page
    When I input "Tarzan" into the "search" field
    And I click "Search" on my keyboard
    Then I see the records containing "Tarzan"
