Feature: Deleting in PaymentInformation Table
  In order to delete a PaymentInformation record in the database
  As a user
  I need to be able to press the "Delete record" Button 

  Scenario: Removing a valid PaymentInformation record
    Given I am on the delete PaymentInformation record page for the record "2022-05-11", "50.00", "User1", "interac"
    And I press the "Delete record" button 
    Then the PaymentInformation record should be deleted
    And I see the PaymentInformation table without the record "2022-05-11", "50.00", "User1", "interac"