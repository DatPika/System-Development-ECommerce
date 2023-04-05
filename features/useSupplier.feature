Feature: Use Autofill supplier
  In order to use the autofill supplier name inside the Add Expense Record Page
  As a user
  I need to be able to click on the supplier name

  Scenario: Use a supplier name to autofill the fields
  	Given I have an expense record with an supplier name of "Hock"
    And I added "Hock" in the autofill options
    And I am on the add expense record page
  	When I press on the supplier name of "Hock"
  	Then I should be able to see "Hock" in the "supplier name" field