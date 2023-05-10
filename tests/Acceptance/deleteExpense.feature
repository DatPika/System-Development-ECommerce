Feature: Delete in Expense Table
  In order to delete Expense records in the database
  As a user
  I need to be able to press the "Delete record" Button 

  Scenario: Removing a valid Expense record
    Given I am on the delete Expense record page for the record "FedEx", "new", "50", "user1"
    And I press the "Delete record" button 
    Then the Expense record should be deleted
    And I see the Expense table without the record "FedEx", "new", "50", "user1"
