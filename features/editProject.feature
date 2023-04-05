Feature: Editing in Projects Table
  In order to edit Project records in the database
  As a user
  I need to be able to update data in the text fields and press the "Edit Record" button

  Scenario: Editing a project record
    Given I am on the edit projects page
    When I click on "Edit" next to the "Tarzan" record
    And I change the "name" to "Jane"
    And I change the "details/information" to "Matte,60ft^2,2400$"
    And I change the "amount" in "deposit" to "1200.00"
    And I change the "paymentMethod" in "deposit" to "interac"
    And I change the "date" in "balance" to "26/04/2012"
    And I change the "amount" in "balance" to "1200.00"
    And I change the "paymentMethod" in "balance" to "cash"
    And I press on the "Edit Record" Button
    Then a record should be updated in the project table
    And I see the project table