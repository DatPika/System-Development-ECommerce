Feature: Add in Expense Table
  In order to add Expense records in the database
  As a user
  I need to be able to input data in the text fields and press the "Add Record" button

  Scenario: The user wants to add an Expense record with the supplier autofill feature
    Given I am on the add Expense record page
    When I click "Chris Paul" from the suggested list
    And I input "PVC Film" in "details/information"
    And I input "200" in "amount"
    And I press the "Add Record" button
    Then I see expense "Chris Paul", "PVC Film" and "200" in the Expense table

  Scenario: The user wants to add an Expense record without the supplier autofill feature
    Given I am logged in
    And I am on the add Expense record page
    When I input "Devin Booker" in "name"
    And I input "PVC Film" in "details/information"
    And I input "200" in "amount"
    And I press the "Add Record" button
    Then I see expense "Devin Booker", "PVC Film" and "200" in the Expense table
