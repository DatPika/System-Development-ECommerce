Feature: View Paysplit
  In order to view the pay split between the two owners' pay
  As an user
  I need to be able to press the Paysplit Button

  Scenario: Viewing the pay split results
  	Given I added a project record ever since the last pay split
    And I added a expense record ever since the last pay split
    And I am on the home page
  	When I press on the "Pay Split" Button
  	Then I see a pop up of the pay split showing the results