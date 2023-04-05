Feature: Delete in Projects Table
  In order to delete Project records in the database
  As a user
  I need to be able to select the record(s) to be delete and press the "Delete Record(s)" button

  Scenario: The user wants to delete multiple Project records
    Given I am on the delete Projects record page
    And I have multiple Project records
    When I select the 2 recent records from the Projects table
    And I press on the "Delete" button
    And I press on the "Confirm" button
    Then the 2 Project records should be deleted
    And I see the Expanse table
