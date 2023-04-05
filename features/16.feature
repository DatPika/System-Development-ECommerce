Feature: View older Expense records
  In order to view older Expense records in the Expense table
  As a user
  I need to be able to press the "Load More Expenses" button

  Scenario: The user wants to view older Expense records
    Given I am on the Expense table page
    When I press the "Load More Expenses" button
    Then I see more Expense records
