Feature: Remove from Supplier list
  In order to remove Suppliers from the supplierList
  As a user
  I need to be able to uncheck the Supplier's box

  Scenario: The user wants to remove a Supplier from the supplierList
    Given I am on the edit supplierList page
    When I uncheck the Supplier "FedEx"
    And I press the "Done" button
    Then the Supplier should be removed from the supplierList
    And I do not see "Fedex" in the supplierList