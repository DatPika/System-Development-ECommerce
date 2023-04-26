Feature: Adding in Trip Table
  In order to add a record in the trip Table
  As a user
  I need to be able to input data in the fields and press the Add Button 

  Scenario: Adding a valid trip record
  	Given I have a project record
    And I have a client record
    And I am on the Add Trip Record page
  	When I input "120.75" in "distance"
    And I click "Service" in "job"
    And I input "Bob James" in "client_name"
    And I input "123 moon street" in "addres
    And I input "4/4/2023" in "startDate"
    And I input "4/4/2023" in "endDate"
    And I input "1" in "project_id"
  	And I press on the "Add Record" Button
  	Then I see the view Trip Page
    And I should be able to see "120.75","Service","Bob James", "123 moon street", "4/4/2023", "4/4/2023", "1" in the view trip page