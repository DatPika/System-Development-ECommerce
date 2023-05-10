Feature: Delete in Projects Table
  In order to delete Project records in the database
  As a user
  I need to be able to press the corresponding Delete Button

  Scenario: The user wants to delete a Project records
    Given I am on the delete Projects record page
    And I have a Project records
    When I press on the "Delete" button next to the record "Tarzan", "33","5", "4", "3","electricity", "Client wants more lights", "07/08/2022", "900.00", "cash", "09/08/2022", "920.25" and "interac"
    And I press on the "Confirm" button
    Then I see the Expense table without the record "Tarzan", "33","5", "4", "3","electricity", "Client wants more lights", "07/08/2022", "900.00", "cash", "09/08/2022", "920.25" and "interac"
