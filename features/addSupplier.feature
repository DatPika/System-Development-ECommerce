Feature: Add Suppliers in autofill option
  In order to add Suppliers in autofill options
  As a user
  I need to be able to check the data in the list and press the "Save" button

  Scenario: The user wants to add a Supplier autofill option
    Given I am on the edit Suppliers page
    When I check "Cam the supplier" in the supplier list
    And I press the "Save" button
    Then I see the supplier "Cam the supplier" in the list of suppliers in the add Expense page