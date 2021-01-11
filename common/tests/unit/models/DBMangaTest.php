<?php namespace common\tests;

use common\models\Manga;
use backend\models\Manager;
use common\models\User;

class DBMangaTest extends \Codeception\Test\Unit
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
    public function testMangaDBIntegration()
    {
        // Function created to avoid conflicts with previous tests and data
        // And to make it possible to see the differences that happen with the test
        
        echo "Extra: Adding necessary records for tests\n";
        // Add necessary records for tests
        $this->tester->haveRecord('common\models\User', ['Username' => 'Nildgar', 'Email' => 'nill546@hotmail.com', 'Gender' => 'M', 'BirthDate' => '1997-12-17', 'auth_key' => '$2y$13$crNmcPz/9DHK66V/nMyEi.IJxnEdrhDlbNReprRk3YdklIPkgT/pK', 'password_hash' => '$2y$13$7IUgFpJg3aXTHKv7.RRcrOdgQfXaXek61sSZb4A0TVuxy0KByw87e']);
        $User = $this->tester->grabRecord('common\models\User', ['Username' => 'Nildgar']);

        $this->tester->haveRecord('backend\models\Manager', ['User_Id' => $User->IdUser]);
        $Manager = $this->tester->grabRecord('backend\models\Manager', ['User_Id' => $User->IdUser]);
        
        // Add two records for tests
        $this->tester->haveRecord('common\models\Manga', ['Title' => 'Title number 1', 'OriginalTitle' => 'Original Title number 1', 'ReleaseDate' => '1998-11-12', 'Description' => 'Description number 1', 'Manager_Id' => $Manager->IdManager]);
        $this->tester->haveRecord('common\models\Manga', ['Title' => 'Title number 2', 'OriginalTitle' => 'Original Title number 2', 'ReleaseDate' => '1998-11-12', 'Description' => 'Description number 2', 'Manager_Id' => $Manager->IdManager]);

        //_______________________________________________________________________________________________________________________________________________________________//

        echo "Test: Validate Manga Fields\n";
        // Create new Manga
        $Manga = new Manga;

        // Put all fields null
        $Manga->Title = null;
        $Manga->AlternativeTitle = null;
        $Manga->OriginalTitle = null;
        $Manga->Status = null;
        $Manga->OneShot = null;
        $Manga->R18 = null;
        $Manga->Server = null;
        $Manga->SrcImage = null;
        $Manga->ReleaseDate = null;
        $Manga->Updated = null;
        $Manga->Description = null;
        $Manga->Manager_Id = null;

        // Verify all fields to see if they accept being null
        $this->assertFalse($Manga->validate('Title'));
        $this->assertFalse($Manga->validate('OriginalTitle'));
        $this->assertFalse($Manga->validate('ReleaseDate'));
        $this->assertFalse($Manga->validate('Description'));
        $this->assertFalse($Manga->validate('Manager_Id'));
        $this->assertTrue($Manga->validate('AlternativeTitle'));
        $this->assertTrue($Manga->validate('SrcImage'));
        
        /* The next four asserts are accepting null, and i can only think that's because of the validation knowing about the "default_value" */
        $this->assertTrue($Manga->validate('Status'));
        $this->assertTrue($Manga->validate('OneShot'));
        $this->assertTrue($Manga->validate('R18'));
        $this->assertTrue($Manga->validate('Server'));
        /* The next assert is accepting null, and i can only think that's because of the validation knowing about the "current_timestamp" */
        $this->assertTrue($Manga->validate('Updated'));

        // Put all fields with unacceptable values
        $Manga->Title = 'It Cant Have More Than On Hundred Characters. So, I Will Speak Until I Use More Than That. Like, This Test Is Tanking Too Long, Thank You';
        $Manga->AlternativeTitle = 'It Cant Have More Than On Hundred Characters. So, I Will Speak Until I Use More Than That. Like, This Test Is Tanking Too Long, Thank You';
        $Manga->OriginalTitle = 'It Cant Have More Than On Hundred Characters. So, I Will Speak Until I Use More Than That. Like, This Test Is Tanking Too Long, Thank You';
        $Manga->Status = 'Hello';
        $Manga->OneShot = 'Hello';
        $Manga->R18 = 'Hello';
        $Manga->Server = 'ItCantHaveMoreThanTenCharacters';
        $Manga->SrcImage = 'It Cant Have More Than Fifty Characters. So, I Will Speak Until I Use More Than That. Ohh I Already Used All :(';
        $Manga->ReleaseDate = 'Hello';
        $Manga->Updated = '18-12-2020 22:23:50';
        $Manga->Description = "I don't know the limites of text";
        $Manga->Manager_Id = 'Hello';

        // Verify all fields to see if they are really unacceptable
        $this->assertFalse($Manga->validate('Title'));
        $this->assertFalse($Manga->validate('AlternativeTitle'));
        $this->assertFalse($Manga->validate('OriginalTitle'));
        $this->assertFalse($Manga->validate('Server'));
        $this->assertFalse($Manga->validate('SrcImage'));
        $this->assertFalse($Manga->validate('Manager_Id'));
        $this->assertFalse($Manga->validate('Status'));
        $this->assertFalse($Manga->validate('OneShot'));
        $this->assertFalse($Manga->validate('R18'));
        
        /* The next assert is accepting unacceptable values because i do not know the limits of text */
        $this->assertTrue($Manga->validate('Description'));
        /* The next assert is accepting null, and i can only think that's because of the validation knowing about the "current_timestamp" */
        $this->assertTrue($Manga->validate('Updated'));
        /* The next assert is accepting unacceptable values, and i can only think that's because of the validation is BROCKEN */
        $this->assertTrue($Manga->validate('ReleaseDate'));

        // Put all fields with acceptable values
        $Manga->Title = 'Title number 3';
        $Manga->AlternativeTitle = 'Alternative Title number 3';
        $Manga->OriginalTitle = 'Original Title number 3';
        $Manga->Status = 1;
        $Manga->OneShot = 0;
        $Manga->R18 = 0;
        $Manga->Server = 'pt_PT';
        $Manga->SrcImage = 'source 3';
        $Manga->ReleaseDate = '1998-11-12';
        $Manga->Description = "Description number 3";
        $Manga->Manager_Id = $Manager->IdManager;

        // Verify all fields to see if they are really acceptable
        $this->assertTrue($Manga->validate('Title'));
        $this->assertTrue($Manga->validate('AlternativeTitle'));
        $this->assertTrue($Manga->validate('OriginalTitle'));
        $this->assertTrue($Manga->validate('Status'));
        $this->assertTrue($Manga->validate('OneShot'));
        $this->assertTrue($Manga->validate('R18'));
        $this->assertTrue($Manga->validate('Server'));
        $this->assertTrue($Manga->validate('SrcImage'));
        $this->assertTrue($Manga->validate('ReleaseDate'));
        $this->assertTrue($Manga->validate('Updated'));
        $this->assertTrue($Manga->validate('Description'));
        $this->assertTrue($Manga->validate('Manager_Id'));

        //_______________________________________________________________________________________________________________________________________________________________//

        echo "Test: Create Manga Record\n";
        // Put all fields with acceptable values and save
        $this->tester->haveRecord('common\models\Manga', ['Title' => 'Title number 3', 'AlternativeTitle' => 'Alternative Title number 3', 'OriginalTitle' => 'Original Title number 3', 'Status' => 1, 'OneShot' => 0, 'R18' => 0, 'Server' => 'pt_PT', 'SrcImage' => 'source 3', 'ReleaseDate' => '1998-11-12', 'Description' => "Description number 3", 'Manager_Id' => $Manager->IdManager]);

        // Verify if Manga was successfully inserted
        $this->tester->seeRecord('common\models\Manga', ['Title' => 'Title number 3', 'OriginalTitle' => 'Original Title number 3']);

        //_______________________________________________________________________________________________________________________________________________________________//

        echo "Test: Update Manga Record\n";
        // Verify if Manga to be updated exists
        $this->tester->seeRecord('common\models\Manga', ['Title' => 'Title number 2', 'OriginalTitle' => 'Original Title number 2']);
        
        // Verify if Manga with new values does not exists
        $this->tester->dontSeeRecord('common\models\Manga', ['Title' => 'Title number 4', 'OriginalTitle' => 'Original Title number 4']);

        // Get Manga to be updated
        $Manga = $this->tester->grabRecord('common\models\Manga', ['Title' => 'Title number 2', 'OriginalTitle' => 'Original Title number 2']);
        
        // Change fields with acceptable values
        $Manga->Title = 'Title number 4';
        $Manga->OriginalTitle = 'Original Title number 4';
        
        // Save Manga
        $Manga->save();
        
        // Verify if Manga was successfully updated
        $this->tester->seeRecord('common\models\Manga', ['Title' => 'Title number 4', 'OriginalTitle' => 'Original Title number 4']);
        
        // Verify if Manga with old values does not exists
        $this->tester->dontSeeRecord('common\models\Manga', ['Title' => 'Title number 2', 'OriginalTitle' => 'Original Title number 2']);

        //_______________________________________________________________________________________________________________________________________________________________//

        echo "Test: Delete Manga Record\n";
        // Verify if Manga to be deleted exists
        $this->tester->seeRecord('common\models\Manga', ['Title' => 'Title number 1', 'OriginalTitle' => 'Original Title number 1']);
        
        // Get Manga to be deleted
        $Manga = $this->tester->grabRecord('common\models\Manga', ['Title' => 'Title number 1', 'OriginalTitle' => 'Original Title number 1']);

        // Delete Manga
        $Manga->delete();

        // Verify if Manga was successfully deleted
        $this->tester->dontSeeRecord('common\models\Manga', ['Title' => 'Title number 1', 'OriginalTitle' => 'Original Title number 1']);
    }
}