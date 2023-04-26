Feature: Adding in Projects Table
  In order to add Project records to the database
  As a user
  I need to be able to input data in the text fields and press the "Add Record" button

  Scenario: Adding a project record
    Given I am on the add projects page
    When I input "Tarzan" in "name"
    And I input "33" in "surfaceArea"
    And I input "5" in "lights"
    And I input "4" in "spots"
    And I input "3" in "vents"
    And I input "electricity" in "works"
    And I input "Client Wants more lights" in "other"
    And I input "07/08/2022" in "date" in "deposit"
    And I input "900.00" in "amount" in "deposit"
    And I pick "cash" in "paymentMethod" in "deposit"
    And I input "09/08/2022" in "date" in "balance"
    And I input "920.25" in "amount" in "balance"
    And I pick "interac" in "paymentMethod" in "balance"
    And I press on the "Add Record" Button
    Then I see "Tarzan", "33","5", "4", "3","electricity", "Client wants more lights", "07/08/2022", "900.00", "cash", "09/08/2022", "920.25" and "interac" in the Project table