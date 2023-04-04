Feature: Editing in Trip Table
  In order to edit a record in the trip Table
  As an user
  I need to be able to change the data in the text fields and press the Save Button

  Scenario: Changing a valid trip record 
  	Given I added a trip record
    And I am on the Edit Trip Record Page
  	When I change the "distance" value to "130.75"
  	And I change the "estimation" value to "No"
    And I change the "date" value to "4/4/2022"
    And I change the "client_name" value to "James"
    And I change the (Ask daniel for project name/id)
    And I press on the "Save" Button
  	Then I see the Main page
    And I should be able to see that the record was modified in the trip table