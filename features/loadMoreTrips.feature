Feature: View more Trip Records
  In order to see more trips records in the view trip table page
  As a user
  I need to be able to press the Load more Button

  Scenario: The user wants to load more trip records
  Given I am on the trips table page
  When I click the "Load More" button
  Then I see more Trip records