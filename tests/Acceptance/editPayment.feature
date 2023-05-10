Feature: Edit in PaymentInformation Table
  In order to edit PaymentInformation records in the database
  As a user
  I need to be able to edit data in the text fields and press the "Edit Record" button

  Scenario: The user wants to edit a PaymentInformation record
    Given I am on the edit PaymentInformation record page
    When I change the "date" value to "21/12/2002"
    And I change the "amount" value to "777"
    And I change the "user_id" value to "user1"
    And I change the "paymentMethod" value to "cash"
    And I press the "Edit Record" button
    Then the PaymentInformation record should be updated
    And I see the record "21/12/2002", "777", "user1", "cash" in the PaymentInformation table