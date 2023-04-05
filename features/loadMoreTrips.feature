Feature: View more Trip Records
  In order to see more trips records in the view trip table page
  As a user
  I need to be able to press the Load more Button

  Scenario: Viewing more trip records
  	Given I am on the View Trip Table page
    And I have more records than the maximum amount shown in the current list of records
  	When I press on the "Load more" Button
  	Then I should be able to see more trips records