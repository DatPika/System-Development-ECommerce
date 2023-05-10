Feature: Deleting in PaymentInformation Table
  In order to delete a PaymentInformation record
  As a user
  I need to be able to press the "Delete record" Button 

  Scenario: Removing a valid PaymentInformation record
    Given I am on the delete PaymentInformation page for the record "2022-05-11", "50.00", ""
    And I press the "Delete record" button 
    Then I see the Trip table without the record "4", "90"