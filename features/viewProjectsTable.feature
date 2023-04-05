Feature: View Projects Table
  In order to view the Projects table
  As a user
  I need to be able to select the "Edit/View Projects" button

  Scenario: The user wants to view Projects table
    Given I am on the home page
    When I click the "Edit/View Projects" button
    Then I see the Projects table
