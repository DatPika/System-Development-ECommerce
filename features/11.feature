Feature: Delete in Expense Table
  In order to delete Expense records in the database
  As a user
  I need to be able to select the record(s) to be delete and press the "Delete Record(s)" button

  Scenario: The user wants to delete multiple Expense records
    Given I am logged in
    And I am on the delete Expense record page
    When I select 3 records from the Expense table 
    And I press on the "Delete" button
    And I press on the "Confirm" button
    Then the 3 Expense records should be deleted
    And I see the Expanse table
