Feature: Add to Supplier list
  In order to add Suppliers to the supplierList
  As a user
  I need to be able to check the Supplier's box

  Scenario: The user wants to add a Supplier to the supplierList
    Given I am on the edit supplierList page
    When I check the Supplier "FedEx"
    And I press the "Done" button
    Then the Supplier should be added to the supplierList
    And I see "Fedex" in the supplierList