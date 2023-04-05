Feature: Add supplier autofill option
  In order to add supplier autofill options
  As a user
  I need to be able to input data in the text fields and press the "Add Supplier" button

  Scenario: The user wants to add a Supplier autofill option
    Given I am logged in
    And I am on the add Supplier page
    When I input "Cam the supplier" in "name"
    And I press the "Add Supplier" button
    Then a new supplier should be added to the autofill options
    And I see the the Expense table