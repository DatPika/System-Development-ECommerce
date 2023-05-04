Feature: Filtered Search
  In order to perform a filtered search for records
  As a user
  I need to be able to choose a "filter" and input into the "search" field and press the "Search" button

  Scenario: The user wants to perform a filtered search
    Given I am on the home page
    When I choose the "Expenses" option in the filter options
    And I input "Tarzan" into the "search" field
    And I click the "Search" button
    Then I see the records containing "Tarzan" in the Expense table
