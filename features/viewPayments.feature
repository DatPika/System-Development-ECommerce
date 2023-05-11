Feature: View PaymentInformation Table
  In order to view the PaymentInformation table
  As a user
  I need to be able to click the "View Payments" button 

  Scenario: The user wants to view PaymentInformation table
    Given I am on the Project table page
    And I have a PaymentInformation record having "4", "interac", "50" and "09/05/2023"
    When I click the "View Payments" button coresponding to the Project record having the project_id "4"
    Then I should see the PaymentInformation record having "4", "interac", "50" and "09/05/2023"

 