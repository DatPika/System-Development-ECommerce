Feature: Edit Supplier autofill option
  In order to edit Supplier autofill options
  As a user
  I need to be able to edit data in the text field and press the "Edit Supplier" button

  Scenario: The user wants to edit a Supplier autofill option
    Given I am logged in
    And I am on the edit Supplier page
    When I change the "name" value to "Mikal the supplier"
    And I press the "Edit Supplier" button
    Then the Supplier should be updated
    And I see the the add Expense record page