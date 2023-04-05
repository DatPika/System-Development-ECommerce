Feature: View more Trip Records
  In order to see more trips records in the view trip table page
  As an user
  I need to be able to press the Load more Button

  Scenario: Viewing more trip records
  	Given I am on the View Trip Table page
  	When I press on the "Load more" Button
  	Then I should be able to see more trips records