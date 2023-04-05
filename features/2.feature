Feature: Editing in Trip Table
  In order to edit a record in the trip Table
  As an user
  I need to be able to change the data in the fields and press the Save Button

  Scenario: Changing a valid trip record
    Given I have a project record
    And I have a client record 
  	And I added a trip record
    And I am on the Edit Trip Record Page
  	When I change the "distance" value to "130.75"
  	And I change the "estimation" value to "Yes"
    And I change the "date" value to "4/4/2022"
    And I press on the "Save" Button
  	Then I see the Main page
    And I should be able to see that the chosen record was modified in the trip table when looking in the view trip table page