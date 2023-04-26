Feature: Delete in Expense Table
  In order to delete Expense records in the database
  As a user
  I need to be able to select the record to be deleted and press the "Delete" button

  Scenario: The user wants to delete an Expense record
    Given I am on the view Expense record page
    When I press on the "Delete" button next to the record "Chris Paul", "PVC Film", "200"
    And After I see a confirmation page I press on the "Confirm" button
    Then I see the Expanse table without the information of "Chris Paul", "PVC Film", "200"
