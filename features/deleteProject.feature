Feature: Delete in Project Table
  In order to delete Project records in the database
  As a user
  I need to be able to press the "Delete record" Button 

  Scenario: Removing a valid Project record
    Given I am on the delete Project record page for the record "Jane", "installation", "2400$", "23/04/2012", "26/04/2012", "true", "60ft^2", "8", "2", "4", "wire move" and "23/04/2012"
    And I press the "Delete record" button 
    Then the Project record should be deleted
    And I see the Project table without the record "Jane", "installation", "2400$", "23/04/2012", "26/04/2012", "true", "60ft^2", "8", "2", "4", "wire move" and "23/04/2012"
