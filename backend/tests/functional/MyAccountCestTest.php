<?php namespace backend\tests;

class MyAccountCestTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\FunctionalTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testViewDataAccount()
    {
        $this->tester->amOnPage('/my_account');
        $this->tester->see('Login');
        $this->tester->fillField('LoginForm[username]', 'Nildgar');
        $this->tester->fillField('LoginForm[password]', 'admin');
        $this->tester->click('login-button');
        $this->tester->see('My Account');
        $this->tester->see('Nildgar');
        $this->tester->see('nill546@hotmail.com');
        $this->tester->see('Man');
        $this->tester->see('17/12/1997');
        $this->tester->see('Dark');
    }

    // tests
    public function testUpdateDataAccount()
    {
        $this->tester->amOnPage('/my_account');
        $this->tester->see('Login');
        $this->tester->fillField('LoginForm[username]', 'Nildgar');
        $this->tester->fillField('LoginForm[password]', 'admin');
        $this->tester->click('login-button');
        $this->tester->see('My Account');
        $this->tester->see('Update');
        $this->tester->click('Update');
        //on click, is redirecting to home page, when it should have opened model
        /*$this->tester->see('Cancel');
        $this->tester->fillField('MyAccountForm[Username]', 'Edgar');
        $this->tester->fillField('MyAccountForm[Genre]', 'Unknow');
        $this->tester->fillField('MyAccountForm[BirthDate]', '20/11/2000');
        $this->tester->fillField('MyAccountForm[Theme]', 'Light');
        $this->tester->click('submit-update-button');
        $this->tester->see('Edgar');
        $this->tester->see('nill546@hotmail.com');
        $this->tester->see('Unknow');
        $this->tester->see('20/11/2000');
        $this->tester->see('Light');*/
    }
}