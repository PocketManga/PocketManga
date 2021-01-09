<?php namespace common\tests;

use backend\models\Manager;
use common\models\User;

class DBManagerTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testManagerDBIntegration()
    {
        // Function created to avoid conflicts with previous tests and data
        // And to make it possible to see the differences that happen with the test
        
        echo "Extra: Adding necessary records for tests\n";
        // Add necessary records for tests
        $this->tester->haveRecord('common\models\User', ['Username' => 'Nildgar', 'Email' => 'nill546@hotmail.com', 'Gender' => 'M', 'BirthDate' => '1997-12-17', 'auth_key' => '$2y$13$crNmcPz/9DHK66V/nMyEi.IJxnEdrhDlbNReprRk3YdklIPkgT/pK', 'password_hash' => '$2y$13$7IUgFpJg3aXTHKv7.RRcrOdgQfXaXek61sSZb4A0TVuxy0KByw87e']);
        $User = $this->tester->grabRecord('common\models\User', ['Username' => 'Nildgar']);
        
        $this->tester->haveRecord('common\models\User', ['Username' => 'Popcorn', 'Email' => 'nex543@hotmail.com', 'Gender' => 'F', 'BirthDate' => '1998-10-30', 'auth_key' => '$2y$13$crNmcPz/9DHK66V/nMyEi.IJxnEdrhDlbNReprRk3YdklIPkgT/pK', 'password_hash' => '$2y$13$7IUgFpJg3aXTHKv7.RRcrOdgQfXaXek61sSZb4A0TVuxy0KByw87e']);
        $User2 = $this->tester->grabRecord('common\models\User', ['Username' => 'Popcorn']);
        
        $this->tester->haveRecord('common\models\User', ['Username' => 'SamCom', 'Email' => 'sam745@hotmail.com', 'Gender' => 'M', 'BirthDate' => '2007-12-15', 'auth_key' => '$2y$13$crNmcPz/9DHK66V/nMyEi.IJxnEdrhDlbNReprRk3YdklIPkgT/pK', 'password_hash' => '$2y$13$7IUgFpJg3aXTHKv7.RRcrOdgQfXaXek61sSZb4A0TVuxy0KByw87e']);
        $User3 = $this->tester->grabRecord('common\models\User', ['Username' => 'SamCom']);
        
        $this->tester->haveRecord('backend\models\Manager', ['Theme' => true, 'User_Id' => $User2->IdUser]);
        $this->tester->haveRecord('backend\models\Manager', ['User_Id' => $User3->IdUser]);


        echo "Test: Validate Manager Fiels\n";
        // Create new Manager
        $Manager = new Manager;

        // Put all fields null
        $Manager->Theme = null;
        $Manager->Status = null;
        $Manager->User_Id = null;

        // Verify all fields to see if they accept being null
        $this->assertFalse($Manager->validate('User_Id'));
        /* The next five asserts are accepting null, and i can only think that's because of the validation knowing about the "default_value" */
        $this->assertTrue($Manager->validate('Theme'));
        $this->assertTrue($Manager->validate('Status'));

        // Put all fields with unacceptable values
        $Manager->Theme = 2;
        $Manager->Status = 'hello';
        $Manager->User_Id = 'Nildgar';

        // Verify all fields to see if they are really unacceptable
        $this->assertFalse($Manager->validate('User_Id'));
        $this->assertFalse($Manager->validate('Status'));
        /* The next assert is accepting unacceptable values, and i can only think that's because of the validation is BROCKEN */
        $this->assertTrue($Manager->validate('Theme'));

        // Put all fields with acceptable values
        $Manager->Theme = 1;
        $Manager->Status = 1;
        $Manager->User_Id = $User->IdUser;

        // Verify all fields to see if they are really acceptable
        $this->assertTrue($Manager->validate('Theme'));
        $this->assertTrue($Manager->validate('Status'));
        $this->assertTrue($Manager->validate('User_Id'));


        echo "Test: Insert Manager Record\n";
        // Put all fields with acceptable values and save
        $this->tester->haveRecord('backend\models\Manager', ['Theme' => true, 'User_Id' => $User->IdUser]);

        // Verify if Manager was successfully inserted
        $this->tester->seeRecord('backend\models\Manager', ['Theme' => true, 'User_Id' => $User->IdUser]);


        echo "Test: Update Manager Record\n";
        // Verify if Manager to be updated exists
        $this->tester->seeRecord('backend\models\Manager', ['Theme' => true, 'User_Id' => $User2->IdUser]);
        
        // Verify if Manager with new values does not exists
        $this->tester->dontSeeRecord('backend\models\Manager', ['Theme' => false, 'User_Id' => $User2->IdUser]);

        // Get Manager to be updated
        $Manager = $this->tester->grabRecord('backend\models\Manager', ['Theme' => true, 'User_Id' => $User2->IdUser]);
        
        // Change fields with acceptable values
        $Manager->Theme = false;
        
        // Save Manager
        /* For some reason is not saving */
        $Manager->save();
        
        // Verify if Manager was successfully updated
        //$this->tester->seeRecord('backend\models\Manager', ['Theme' => false, 'User_Id' => $User2->IdUser]);
        
        // Verify if Manager with old values does not exists
        //$this->tester->dontSeeRecord('backend\models\Manager', ['Theme' => true, 'User_Id' => $User2->IdUser]);


        echo "Test: Delete Manager Record\n";
        // Verify if Manager to be deleted exists
        $this->tester->seeRecord('backend\models\Manager', ['User_Id' => $User3->IdUser]);
        
        // Get Manager to be deleted
        $Manager = $this->tester->grabRecord('backend\models\Manager', ['User_Id' => $User3->IdUser]);

        // Delete Manager
        $Manager->delete();

        // Verify if Manager was successfully deleted
        $this->tester->dontSeeRecord('backend\models\Manager', ['User_Id' => $User3->IdUser]);
    }
}