Feature: Use Autofill supplier
  In order to use the autofill supplier name inside the Add Expense Record Page
  As a user
  I need to be able to click on the supplier name

  Scenario: Use a supplier name to autofill the supplier name field
  	Given I am on the Add Expense Record page
    And I added "Hock" in the autofill supplier list
  	When I press on the supplier name of "Hock"
  	Then I should be able to see "Hock" in the "Supplier Name" field