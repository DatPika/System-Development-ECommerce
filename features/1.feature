Feature: Adding in Trip Table
  In order to add a record in the trip Table
  As an user
  I need to be able to input data in the text fields and press the Add Button 

  Scenario: Adding a valid trip record
  	Given I am on the Add Trip Record page
  	When I input "120.75" in "distance"
    And I input "Yes" in "estimation"
    And I input "Bob" in "client_name"
    And I input "4/4/2023" in "date" (idk if it will be current date or custom date)
    And I input (Ask daniel for project name/id)
  	And I press on the "Add" Button
  	Then I see the Main Page
    And I should be able to see that the record was added in the trip table