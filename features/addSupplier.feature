Feature: Add Supplier autofill option
  In order to add Supplier autofill options
  As a user
  I need to be able to input data in the text fields and press the "Add Supplier" button

  Scenario: The user wants to add a Supplier autofill option
    Given I am on the add Supplier page
    When I input "Cam the supplier" in "name"
    And I press the "Add Supplier" button
    Then I see supplier "Cam the supplier"