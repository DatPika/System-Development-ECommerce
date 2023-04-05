Feature: Delete Supplier autofill option
  In order to delete Supplier autofill options
  As a user
  I need to be able to select the supplier(s) to be delete and press the "Delete Supplier(s)" button

  Scenario: The user wants to delete the first Supplier autofill options
    Given I am logged in
    And I am on the delete Supplier autofill option
    When I select the first Supplier autofill option
    And I press on the "Delete" button
    And I press on the "Confirm" button
    Then the first autofill option should be deleted
    And I see the add Expanse record page