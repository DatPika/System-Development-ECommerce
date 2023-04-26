Feature: Deleting in Trip Table
  In order to delete a record in the trip Table
  As a user
  I need to be able to select the record to delete and press the Delete Button

  Scenario: Removing a valid trip record
  	Given I have a trip record
    And I am on the Delete Trip Record Page
  	When I select the trip record "120.75","Service","Bob James", "123 moon street", "4/4/2023", "4/4/2023", "1"
    And I press on the "Confirm" Button
  	Then I see the Trip table without the trip record "120.75","Service","Bob James", "123 moon street", "4/4/2023", "4/4/2023", "1"