Feature: Deleting in Trip Table
  In order to delete a record in the trip Table
  As an user
  I need to be able to select the record to delete and press the Delete Button

  Scenario: Removing a valid trip record 
  	Given I added a trip record
    And I am on the Delete Trip Record Page
  	When I select a record from the trip table
    And I press on the "Delete" Button
    And I press on the "Confirm" Button
  	Then I see the Main page
    And I should be able to see that the record was removed from the trip table when looking in the view trip table page