Feature: Edit in Expense Table
  In order to edit Expense records in the database
  As a user
  I need to be able to edit data in the text fields and press the "Edit Record" button

  Scenario: The user wants to edit an Expense record with the supplier autofill feature
    Given I am on the edit Expense record page
    When I click "Kevin Durant" from the suggested list
    And I change the "details/information" value to "White Paint"  
    And I change the "amount" value to "200"
    And I press the "Edit Record" button
    Then I see expense "Kevin Durant", "White Paint" and "200"

  Scenario: The user wants to edit an Expense record without the supplier autofill feature
    Given I am logged in
    And I am on the edit Expense record page
    When I change the "name" value to "Deandre Ayton"
    And I change the "details/information" value to "White Paint"  
    And I change the "amount" value to "400"
    And I press the "Edit Record" button
    Then I see expense "Deandre Ayton", "White Paint" and "400"

