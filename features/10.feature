Feature: Edit in Expense Table
  In order to edit Expense records in the database
  As a user
  I need to be able to edit data in the text fields and press the "Edit Record" button

  Scenario: The user wants to edit an Expense record with the supplier autofill feature
    Given I am logged in
    And I am on the edit record page
    When I click "Kevin Durant" from the suggested list
    And I change the "details/information" value to "White Paint"  
    And I change the "amount" value to "200"
    And I press the "Edit Record" button
    Then the record should be updated
    And I see the Expense table

  Scenario: The user wants to edit an Expense record with the supplier autofill feature
    Given I am logged in
    And I am on the edit record page
    When I change the "name" value to "Deandre Ayton"
    And I change the "details/information" value to "White Paint"  
    And I change the "amount" value to "400"
    And I press the "Edit Record" button
    Then the record should be updated
    And I see the Expense table

