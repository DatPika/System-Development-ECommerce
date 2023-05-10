Feature: Deleting in Trip Table
  In order to delete a Trip record
  As a user
  I need to be able to press the "Delete record" Button 

  Scenario: Removing a valid Trip record
  	Given I am on the delete Trip page for the record "4", "90"
    And I press the "Delete record" button 
    Then I see the Trip table without the record "4", "90"