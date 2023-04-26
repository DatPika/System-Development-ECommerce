Feature: View more Expense Records
  In order to see more expense records in the view expense table page
  As a user
  I need to be able to press the Load more Button

  Scenario: The user wants to load more expense records
  Given I am on the expense table page
  When I click the "Load More" button
  Then I see more Expense records