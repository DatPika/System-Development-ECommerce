Feature: Undo
  In order to undo certain changes
  As a user
  I need to be able to click on the Undo Button

  Scenario: Undo
  	Given I pressed on the "Load More" Button once
    And I am on the home page
  	When I press on the "Undo" Button
  	Then I no longer see the additional records