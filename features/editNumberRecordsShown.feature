Feature: Editing the number of shown records
  In order to edit the number of shown records on the screen at once
  As a user
  I need to be able to update the field press the "Edit" button

  Scenario: Editing the number of shown records and refreshing the page
    Given I am on the home page
    When I input "20" into the "numberOfRecordsShown" field
    And I click on the "Edit" button next to the "numberOfRecordsShown" field
    And I refresh the page
    Then I see 20 records

  Scenario: Editing the number of shown records loading more records
    Given I am on the home page
    When I input "15" into the "numberOfRecordsShown" field
    And I click on the "Edit" button next to the "numberOfRecordsShown" field
    And I click on the "Load More" button at the bottom of the page
    Then I see 25 records