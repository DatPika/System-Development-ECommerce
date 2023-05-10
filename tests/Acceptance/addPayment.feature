Feature: Add Payment record to Project record
	In order to add PaymentInformation records in the database
  	As a user
  	I need to be able to input data in the text fields and press the "Add Payment" button

  	Scenario: The user wants to add a PaymentInformation record to a Project record
    Given I am on the add PaymentInformation record page
    When I input "21/12/2002" in "date"
    And I input "500" in "amount"
    And I click "user1" in "user_id"
    And I click "Cash" in "paymentMethod"
    And I press the "Add Record" button
    Then I see "21/12/2002", "500" and "cash" in the Expense table