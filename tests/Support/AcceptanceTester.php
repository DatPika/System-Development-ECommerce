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
     * @Given I am on Google
     */
    public function iAmOnGoogle()
    {
        $this->amOnPage("https://google.ca");
    }

   /**
    * @When I input :value in :fieldName
    */
    public function iInputIn($value, $fieldName)
    {
        $this->fillField($fieldName, $value);
    }

   /**
    * @When I press :text
    */
    public function iPress($text)
    {
        $this->click($text);
    }

   /**
    * @Then I see :text
    */
    public function iSee($text)
    {
        $this->see($text);
    }
    /**
     * @Then I don't see :text
     */
    public function iDontSee($text)
    {
        $this->dontSee($text);
    }
}
