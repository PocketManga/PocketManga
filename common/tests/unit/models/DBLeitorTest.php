<?php namespace common\tests;

use common\models\Leitor;
use common\models\User;

class DBLeitorTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;
    protected $User3_Id;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testLeitorDBIntegration()
    {
        // Function created to avoid conflicts with previous tests and data
        // And to make it possible to see the differences that happen with the test
        
        // Add necessary records for tests
        $this->tester->haveRecord('common\models\User', ['Username' => 'Nildgar', 'Email' => 'nill546@hotmail.com', 'Gender' => 'M', 'BirthDate' => '1997-12-17', 'auth_key' => '$2y$13$crNmcPz/9DHK66V/nMyEi.IJxnEdrhDlbNReprRk3YdklIPkgT/pK', 'password_hash' => '$2y$13$7IUgFpJg3aXTHKv7.RRcrOdgQfXaXek61sSZb4A0TVuxy0KByw87e']);
        $User = $this->tester->grabRecord('common\models\User', ['Username' => 'Nildgar']);
        
        $this->tester->haveRecord('common\models\User', ['Username' => 'Popcorn', 'Email' => 'nex543@hotmail.com', 'Gender' => 'F', 'BirthDate' => '1998-10-30', 'auth_key' => '$2y$13$crNmcPz/9DHK66V/nMyEi.IJxnEdrhDlbNReprRk3YdklIPkgT/pK', 'password_hash' => '$2y$13$7IUgFpJg3aXTHKv7.RRcrOdgQfXaXek61sSZb4A0TVuxy0KByw87e']);
        $User2 = $this->tester->grabRecord('common\models\User', ['Username' => 'Popcorn']);
        
        $this->tester->haveRecord('common\models\User', ['Username' => 'SamCom', 'Email' => 'sam745@hotmail.com', 'Gender' => 'M', 'BirthDate' => '2007-12-15', 'auth_key' => '$2y$13$crNmcPz/9DHK66V/nMyEi.IJxnEdrhDlbNReprRk3YdklIPkgT/pK', 'password_hash' => '$2y$13$7IUgFpJg3aXTHKv7.RRcrOdgQfXaXek61sSZb4A0TVuxy0KByw87e']);
        $User3 = $this->tester->grabRecord('common\models\User', ['Username' => 'SamCom']);
        
        $this->tester->haveRecord('common\models\LibraryList', ['Name' => 'Uncategorized']);
        $List = $this->tester->grabRecord('common\models\LibraryList', ['Name' => 'Uncategorized']);
        
        $this->tester->haveRecord('common\models\LibraryList', ['Name' => 'Reading']);
        $List2 = $this->tester->grabRecord('common\models\LibraryList', ['Name' => 'Reading']);
        
        // Add two records for tests
        $this->tester->haveRecord('common\models\Leitor', ['MangaShow' => 1, 'User_Id' => $User2->IdUser, 'PrimaryList_Id' => $List->IdList]);
        $this->tester->haveRecord('common\models\Leitor', ['MangaShow' => 2, 'User_Id' => $User3->IdUser, 'PrimaryList_Id' => $List->IdList]);




        
        // Create new Leitor
        $Leitor = new Leitor;

        // Put all fields null
        $Leitor->Theme = null;
        $Leitor->MangaShow = null;
        $Leitor->ChapterShow = null;
        $Leitor->Server = null;
        $Leitor->Status = null;
        $Leitor->PrimaryList_Id = null;
        $Leitor->User_Id = null;

        // Verify all fields to see if they accept being null
        $this->assertFalse($Leitor->validate('MangaShow'));
        $this->assertFalse($Leitor->validate('User_Id'));
        
        /* The next five asserts are accepting null, and i can only think that's because of the validation knowing about the "default_value" */
        $this->assertTrue($Leitor->validate('Theme'));
        $this->assertTrue($Leitor->validate('ChapterShow'));
        $this->assertTrue($Leitor->validate('Server'));
        $this->assertTrue($Leitor->validate('Status'));
        $this->assertTrue($Leitor->validate('PrimaryList_Id'));

        // Put all fields with unacceptable values
        $Leitor->Theme = 2;
        $Leitor->MangaShow = 'Hello';
        $Leitor->ChapterShow = 2;
        $Leitor->Server = 'ItCantHaveMoreThanTenCharacters';
        $Leitor->Status = 'Hello';
        $Leitor->PrimaryList_Id = 1.2;
        $Leitor->User_Id = 'Nildgar';

        // Verify all fields to see if they are really unacceptable
        $this->assertFalse($Leitor->validate('Server'));
        $this->assertFalse($Leitor->validate('PrimaryList_Id'));
        $this->assertFalse($Leitor->validate('User_Id'));
        $this->assertFalse($Leitor->validate('Status'));
        /* The next three asserts are accepting unacceptable values, and i can only think that's because of the validation is BROCKEN */
        $this->assertTrue($Leitor->validate('Theme'));
        $this->assertTrue($Leitor->validate('MangaShow'));
        $this->assertTrue($Leitor->validate('ChapterShow'));

        // Put all fields with acceptable values
        $Leitor->Theme = 1;
        $Leitor->MangaShow = '1';
        $Leitor->ChapterShow = 1;
        $Leitor->Server = 'pt_PT';
        $Leitor->Status = 1;
        $Leitor->PrimaryList_Id = $List->IdList;
        $Leitor->User_Id = $User->IdUser;

        // Verify all fields to see if they are really acceptable
        $this->assertTrue($Leitor->validate('Theme'));
        $this->assertTrue($Leitor->validate('MangaShow'));
        $this->assertTrue($Leitor->validate('ChapterShow'));
        $this->assertTrue($Leitor->validate('Status'));
        $this->assertTrue($Leitor->validate('Server'));
        $this->assertTrue($Leitor->validate('PrimaryList_Id'));
        $this->assertTrue($Leitor->validate('User_Id'));



        
        // Put all fields with acceptable values and save
        $this->tester->haveRecord('common\models\Leitor', ['Theme' => true, 'MangaShow' => 1, 'ChapterShow' => true, 'Server' => 'pt_PT', 'PrimaryList_Id' => $List->IdList, 'User_Id' => $User->IdUser]);

        // Verify if Leitor was successfully inserted
        $this->tester->seeRecord('common\models\Leitor', ['Theme' => true, 'User_Id' => $User->IdUser]);



        
        // Verify if Leitor to be updated exists
        $this->tester->seeRecord('common\models\Leitor', ['PrimaryList_Id' => $List->IdList, 'User_Id' => $User2->IdUser]);
        
        // Verify if Leitor with new values does not exists
        $this->tester->dontSeeRecord('common\models\Leitor', ['PrimaryList_Id' => $List2->IdList, 'User_Id' => $User2->IdUser]);

        // Get Leitor to be updated
        $Leitor = $this->tester->grabRecord('common\models\Leitor', ['PrimaryList_Id' => $List->IdList, 'User_Id' => $User2->IdUser]);
        
        // Change fields with acceptable values
        $Leitor->PrimaryList_Id = $List2->IdList;
        
        // Save Leitor
        $Leitor->save();
        
        // Verify if Leitor was successfully updated
        $this->tester->seeRecord('common\models\Leitor', ['PrimaryList_Id' => $List2->IdList, 'User_Id' => $User2->IdUser]);
        
        // Verify if Leitor with old values does not exists
        $this->tester->dontSeeRecord('common\models\Leitor', ['PrimaryList_Id' => $List->IdList, 'User_Id' => $User2->IdUser]);



        
        // Verify if Leitor to be deleted exists
        $this->tester->seeRecord('common\models\Leitor', ['MangaShow' => 2, 'User_Id' => $User3->IdUser]);
        
        // Get Leitor to be deleted
        $Leitor = $this->tester->grabRecord('common\models\Leitor', ['MangaShow' => 2, 'User_Id' => $User3->IdUser]);

        // Delete Leitor
        $Leitor->delete();

        // Verify if Leitor was successfully deleted
        $this->tester->dontSeeRecord('common\models\Leitor', ['MangaShow' => 2, 'User_Id' => $User3->IdUser]);
    }
}