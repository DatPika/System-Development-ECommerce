<?php

declare(strict_types=1);

namespace Tests\Support;

/**
 * Inherited Methods
 * @method void wantTo($text)
 * @method void wantToTest($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause($vars = [])
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * @Given I am on the add Expense record page
     */
    public function iAmOnTheAddExpenseRecordPage()
    {
    }

   /**
    * @When I click :arg1 from the suggested list
    */
    public function iClickFromTheSuggestedList($arg1)
    {
    }

   /**
    * @When I press the :arg1 button
    */
    public function iPressTheButton($arg1)
    {
        
    }

   /**
    * @Then I see :arg1, :arg2 and :arg3 in the Expense table
    */
    public function iSeeAndInTheExpenseTable($arg1, $arg2, $arg3)
    {
    }

   /**
    * @Given I am logged in
    */
    public function iAmLoggedIn()
    {
    }    

   /**
    * @Given I am on the add projects page
    */
    public function iAmOnTheAddProjectsPage()
    {
    }

   /**
    * @When I input :arg1 in :arg2 in :arg3
    */
    public function iInputInIn($arg1, $arg2, $arg3)
    {
    }

   /**
    * @When I pick :arg1 in :arg2 in :arg3
    */
    public function iPickInIn($arg1, $arg2, $arg3)
    {
    }

   /**
    * @When I press on the :arg1 Button
    */
    public function iPressOnTheButton($arg1)
    {
    }

   /**
    * @Then I see :arg1, :arg2,:arg3, :arg4, :arg5,:arg6, :arg7, :arg8, :arg9, :arg10, :arg11, :arg12 and :arg13 in the Project table
    */
    public function iSeeAndInTheProjectTable($arg1, $arg2, $arg3, $arg4, $arg5, $arg6, $arg7, $arg8, $arg9, $arg10, $arg11, $arg12, $arg13)
    {
    }

   /**
    * @Given I have a project record
    */
    public function iHaveAProjectRecord()
    {
        
    }

   /**
    * @Given I have a client record
    */
    public function iHaveAClientRecord()
    {
        
    }

   /**
    * @Given I am on the Add Trip Record page
    */
    public function iAmOnTheAddTripRecordPage()
    {
    }

   /**
    * @When I click :arg1 in :arg2
    */
    public function iClickIn($arg1, $arg2)
    {
        
    }

   /**
    * @When I input :arg1 in "addres
    */
    public function iInputInaddres($num1, $num2, $num3, $arg1)
    {
        
    }

   /**
    * @Then I see the view Trip Page
    */
    public function iSeeTheViewTripPage()
    {
    }

   /**
    * @Then I should be able to see :arg1,:arg2,:arg3, :arg4, :arg5, :arg5, :arg7 in the view trip page
    */
    public function iShouldBeAbleToSeeInTheViewTripPage($arg1, $arg2, $arg3, $arg4, $arg5, $arg6, $arg7)
    {
    }

   /**
    * @Given I am on the view Expense record page
    */
    public function iAmOnTheViewExpenseRecordPage()
    {
    }

   /**
    * @When I press on the :arg1 button next to the record :arg2, :arg3, :arg4
    */
    public function iPressOnTheButtonNextToTheRecord($arg1, $arg2, $arg3, $arg4)
    {
    }

   /**
    * @When After I see a confirmation page I press on the :arg1 button
    */
    public function afterISeeAConfirmationPageIPressOnTheButton($arg1)
    {
    }

   /**
    * @Then I don't see :arg1, :arg2, :arg3 in the Expense table
    */
    public function iDontSeeInTheExpenseTable($arg1, $arg2, $arg3)
    {
    }

   /**
    * @Given I am on the delete Projects record page
    */
    public function iAmOnTheDeleteProjectsRecordPage()
    {
    }

   /**
    * @Given I have a Project records
    */
    public function iHaveAProjectRecords()
    {
        
    }

   /**
    * @When I press on the :arg1 button next to the record :arg2, :arg3,:arg4, :arg5, :arg6,:arg7, :arg8, :arg9, :arg10, :arg11, :arg12, :arg13 and :arg14
    */
    public function iPressOnTheButtonNextToTheRecordAnd($arg1, $arg2, $arg3, $arg4, $arg5, $arg6, $arg7, $arg8, $arg9, $arg10, $arg11, $arg12, $arg13, $arg14)
    {
    }

   /**
    * @Then I see the Expense table without the record :arg1, :arg2,:arg3, :arg4, :arg5,:arg6, :arg7, :arg8, :arg9, :arg10, :arg11, :arg12 and :arg13
    */
    public function iSeeTheExpenseTableWithoutTheRecordAnd($arg1, $arg2, $arg3, $arg4, $arg5, $arg6, $arg7, $arg8, $arg9, $arg10, $arg11, $arg12, $arg13)
    {
    }

   /**
    * @Given I have a trip record
    */
    public function iHaveATripRecord()
    {
        
    }

   /**
    * @Given I am on the Delete Trip Record Page
    */
    public function iAmOnTheDeleteTripRecordPage()
    {
    }

   /**
    * @When I select the trip record :arg1,:arg2,:arg3, :arg4, :arg5, :arg5, :arg7
    */
    public function iSelectTheTripRecord($arg1, $arg2, $arg3, $arg4, $arg5, $arg6, $arg7)
    {
    }

   /**
    * @Then I see the Trip table without the trip record :arg1,:arg2,:arg3, :arg4, :arg5, :arg5, :arg7
    */
    public function iSeeTheTripTableWithoutTheTripRecord($arg1, $arg2, $arg3, $arg4, $arg5, $arg6, $arg7)
    {
    }

   /**
    * @Given I am on the edit Expense record page
    */
    public function iAmOnTheEditExpenseRecordPage()
    {
    }

   /**
    * @When I change the :arg1 value to :arg2
    */
    public function iChangeTheValueTo($arg1, $arg2)
    {
    }

   /**
    * @Then I see expense :arg1, :arg2 and :arg3
    */
    public function iSeeExpenseAnd($arg1, $arg2, $arg3)
    {
    }

   /**
    * @Given I am on the edit projects page
    */
    public function iAmOnTheEditProjectsPage()
    {
    }

   /**
    * @When I click on :arg1 next to the :arg2 record
    */
    public function iClickOnNextToTheRecord($arg1, $arg2)
    {
    }

   /**
    * @When I change the :arg1 to :arg2
    */
    public function iChangeTheTo($arg1, $arg2)
    {
    }

   /**
    * @When I change :arg1 to :arg2
    */
    public function iChangeTo($arg1, $arg2)
    {
        
    }

   /**
    * @When I change the :arg1 in :arg2 to :arg3
    */
    public function iChangeTheInTo($arg1, $arg2, $arg3)
    {
    }

   /**
    * @Then a the project table with the record :arg1, :arg2, :arg3, :arg4, :arg5, :arg6, :arg7, :arg8, :arg9, :arg10, :arg11, :arg4, :arg13, :arg14, :arg5, :arg13, :arg17
    */
    public function aTheProjectTableWithTheRecord($arg1, $arg2, $arg3, $arg4, $arg5, $arg6, $arg7, $arg8, $arg9, $arg10, $arg11, $arg12, $arg13, $arg14, $arg15, $arg16, $arg17)
    {
    }

   /**
    * @Given I added a trip record
    */
    public function iAddedATripRecord()
    {
        
    }

   /**
    * @Given I am on the Edit Trip Record Page
    */
    public function iAmOnTheEditTripRecordPage()
    {
    }

   /**
    * @Then I see the Main page
    */
    public function iSeeTheMainPage()
    {
        
    }

   /**
    * @Then I should be able to see that the chosen record was modified in the trip table when looking in the view trip table page
    */
    public function iShouldBeAbleToSeeThatTheChosenRecordWasModifiedInTheTripTableWhenLookingInTheViewTripTablePage()
    {
    }

   /**
    * @Given I am on the home page
    */
    public function iAmOnTheHomePage()
    {
    }

   /**
    * @When I click the :arg1 button
    */
    public function iClickTheButton($arg1)
    {
        
    }

   /**
    * @Then I see the Expense table
    */
    public function iSeeTheExpenseTable()
    {
        
    }

   /**
    * @Given I have a trip record having :arg1,:arg2, :arg3, :arg4, :arg5 as data
    */
    public function iHaveATripRecordHavingAsData($arg1, $arg2, $arg3, $arg4, $arg5)
    {

    }

   /**
    * @Then I see the Projects table
    */
    public function iSeeTheProjectsTable()
    {
        
    }

   /**
    * @Then I should be able to see the Trip table
    */
    public function iShouldBeAbleToSeeTheTripTable()
    {
        
    }

}
