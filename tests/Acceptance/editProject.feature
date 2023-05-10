Feature: Editing in Projects Table
  In order to edit Project records in the database
  As a user
  I need to be able to update data in the text fields and press the "Edit Record" button

  Scenario: Editing a project record
    Given I am on the edit Project record page for the record "Jane", "installation", "2400$", "23/04/2012", "26/04/2012", "true", "60ft^2", "8", "2", "4", "wire move" and "23/04/2012"
    And I change the "clientName" to "Jane"
    And I change the "job" to "installation"
    And I change the "projectCost" to "2400$"
    And I change the "startDate" to "23/04/2012"
    And I change the "startDate" to "26/04/2012"
    And I change "done" to "true"
    And I change the "surfaceArea" to "60ft^2"
    And I change the "lights" to "8"
    And I change the "spots" to "2"
    And I change the "vents" to "4"
    And I change the "works" to "wire move"
    And I change the "date" in "deposit" to "23/04/2012"
    And I press on the "Edit Record" Button
    Then a the project table with the record "Jane", "installation", "2400$", "23/04/2012", "26/04/2012", "true", "60ft^2", "8", "2", "4", "wire move", "23/04/2012", "1200.00", "interac", "26/04/2012", "1200.00", "cash"

    