Feature: Adding in Projects Table
  In order to add Project records to the database
  As a user
  I need to be able to input data in the text fields and press the "Add Record" button

  Scenario: Adding a project record
    Given I am on the add projects page
    When I input "Tarzan" in "name"
    And I input "Satin,44ft^2,2000$" in "details/information"
    And I input "07/08/2022" in "date" in "deposit"
    And I input "900.00" in "amount" in "deposit"
    And I pick "cash" in "paymentMethod" in "deposit"
    And I input "09/08/2022" in "date" in "balance"
    And I input "920.25" in "amount" in "balance"
    And I pick "interac" in "paymentMethod" in "balance"
    And I press on the "Add Record" Button
    Then a new record should be added to the project table
    And I see the project table with the information of "Tarzan" in the "name" column