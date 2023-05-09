Feature: Uncheck Supplier autofill option
  In order to stop seeing a Supplier autofill option
  As a user
  I need to be able to select the supplier(s) to be shown and press the "Confirm" button

  Scenario: The user wants to uncheck the first Supplier autofill option
    Given I am on the edit autofill supplier list page
    When I select the Supplier autofill option "Rona"
    And I press on the "Confirm" button
    And I see the add Expense record page without the "Rona" autofill option