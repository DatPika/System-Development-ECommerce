Feature: Adding in Trip Table
  In order to add a record in the trip Table
  As a user
  I need to be able to input data in the fields and press the Add Button 

  Scenario: Adding a valid trip record
  	Given I have a project record
    And I have a client record
    And I am on the Add Trip Record page
  	When I input "120.75" in "distance"
    And I input "No" in "job"
    And I input "Bob James" in "client_name"
    And I input "4/4/2023" in "date"
    And I input "1" in "project_id"
  	And I press on the "Add" Button
  	Then I see the Main Page
    And I should be able to see that the record was created in the trip table when looking in the view trip table page