Feature: View Trip Table
  In order to see the view the trip table page
  As a user
  I need to be able to press the View Button under Trip

  Scenario: Viewing the trip table page
  	Given I am on the home page
    And I have a trip record having "120.75","estimation", "Bob James", "4/4/2023", "1" as data
  	When I press on the "View" Button under the "Trip" header
  	Then I should be able to see the Trip table with "120.75","estimation", "Bob James", "4/4/2023", "1" as a record in the table