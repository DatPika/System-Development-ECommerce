Feature: View Projects Table
  In order to view the Project table
  As a user
  I need to be able to select the "View" button under the "Project" header

  Scenario: The user wants to view Project table
    Given I am on the home page
    And I have a trip record having "120.75","estimation", "Bob James", "4/4/2023", "1" as data
    When I click the "Edit/View Projects" button
    Then I see the Projects table
