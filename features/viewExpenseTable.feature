Feature: View Expense Table
  In order to view the Projects table
  As a user
  I need to be able to select the "Edit/View Expense" button

  Scenario: The user wants to view the Expense table
    Given I am on the home page
    When I click the "Edit/View Expense" button
    Then I see the Expense table