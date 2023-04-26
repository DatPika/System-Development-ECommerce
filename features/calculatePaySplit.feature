Feature: Calculate Pay split
  In order to view the pay split between the two owners' pay
  As a user
  I need to be able to press the Calculate Pay split Button

  Scenario: Viewing the pay split results
  	Given I added a project record since the last pay split
    And I added a expense record since the last pay split
    And I am on the home page
  	When I press on the "Pay Split" Button
  	Then I see a pop up of the pay split showing the results
    And I should be able to see a red line after the most recent record listed on the home page