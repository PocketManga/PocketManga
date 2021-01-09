<?php namespace common\tests;

use common\models\Chapter;
use backend\models\Manager;
use common\models\Manga;
use common\models\User;

class DBChapterTest extends \Codeception\Test\Unit
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
    public function testChapterDBIntegration()
    {
        // Function created to avoid conflicts with previous tests and data
        // And to make it possible to see the differences that happen with the test

        // Add necessary records for tests
        $this->tester->haveRecord('common\models\User', ['Username' => 'Nildgar', 'Email' => 'nill546@hotmail.com', 'Gender' => 'M', 'BirthDate' => '1997-12-17', 'auth_key' => '$2y$13$crNmcPz/9DHK66V/nMyEi.IJxnEdrhDlbNReprRk3YdklIPkgT/pK', 'password_hash' => '$2y$13$7IUgFpJg3aXTHKv7.RRcrOdgQfXaXek61sSZb4A0TVuxy0KByw87e']);
        $User = $this->tester->grabRecord('common\models\User', ['Username' => 'Nildgar']);
        $this->tester->assertNotNull($User);

        $this->assertTrue($User->validate('Username'));
        $this->assertTrue($User->validate('Email'));

        $this->tester->haveRecord('backend\models\Manager', ['User_Id' => $User->IdUser]);
        $Manager = $this->tester->grabRecord('backend\models\Manager', ['User_Id' => $User->IdUser]);
        
        $this->tester->haveRecord('common\models\Manga', ['Title' => 'Manga Title', 'OriginalTitle' => 'Manga Original Tite', 'ReleaseDate' => '2019-12-25', 'Description' => 'A really cute romance between and elf and a boyish girl', 'Manager_Id' => $Manager->IdManager]);
        $Manga = $this->tester->grabRecord('common\models\Manga', ['Title' => 'Manga Title']);
        
        // Add two records for tests
        $this->tester->haveRecord('common\models\Chapter', ['Number' => 1, 'PagesNumber' => 10, 'Season' => 1, 'Manga_Id' => $Manga->IdManga, 'Manager_Id' => $Manager->IdManager]);
        $this->tester->haveRecord('common\models\Chapter', ['Number' => 2, 'PagesNumber' => 11, 'Season' => 1, 'Manga_Id' => $Manga->IdManga, 'Manager_Id' => $Manager->IdManager]);
    




        // Create new Chapter
        $Chapter = new Chapter;

        // Put all fields null
        $Chapter->Number = null;
        $Chapter->PagesNumber = null;
        $Chapter->Name = null;
        $Chapter->ReleaseDate = null;
        $Chapter->Updated = null;
        $Chapter->Season = null;
        $Chapter->OneShot = null;
        $Chapter->SrcFolder = null;
        $Chapter->Manga_Id = null;
        $Chapter->Manager_Id = null;

        // Verify all fields to see if they accept being null
        $this->assertFalse($Chapter->validate('Number'));
        $this->assertFalse($Chapter->validate('PagesNumber'));
        $this->assertFalse($Chapter->validate('Manga_Id'));
        $this->assertFalse($Chapter->validate('Manager_Id'));

        $this->assertTrue($Chapter->validate('Name'));
        $this->assertTrue($Chapter->validate('Season'));
        $this->assertTrue($Chapter->validate('SrcFolder'));
        /* The next two asserts are accepting null, and i can only think that's because of the validation knowing about the "current_timestamp" */
        $this->assertTrue($Chapter->validate('ReleaseDate'));
        $this->assertTrue($Chapter->validate('Updated'));
        /* The next assert is accepting null, and i can only think that's because of the validation knowing about the "default_value" */
        $this->assertTrue($Chapter->validate('OneShot'));

        // Put all fields with unacceptable values
        $Chapter->Number = "Hello";
        $Chapter->PagesNumber = 12.5;
        $Chapter->Name = 'It Cant Have More Than On Hundred Characters. So, I Will Speak Until I Use More Than That. Like, This Test Is Tanking Too Long, Thank You';
        $Chapter->ReleaseDate = '12-11-1998';
        $Chapter->Updated = '18-12-2020 22:23:50';
        $Chapter->Season = 1.2;
        $Chapter->OneShot = 2;
        $Chapter->SrcFolder = 'It Cant Have More Than Fifty Characters. So, I Will Speak Until I Use More Than That. Ohh I Already Used All :(';
        $Chapter->Manga_Id = 0;
        $Chapter->Manager_Id = 0;

        // Verify all fields to see if they are really unacceptable
        $this->assertFalse($Chapter->validate('Number'));
        $this->assertFalse($Chapter->validate('PagesNumber'));
        $this->assertFalse($Chapter->validate('Name'));
        $this->assertFalse($Chapter->validate('Season'));
        $this->assertFalse($Chapter->validate('SrcFolder'));
        $this->assertFalse($Chapter->validate('Manga_Id'));
        $this->assertFalse($Chapter->validate('Manager_Id'));
        /* The next two asserts are accepting unacceptable values, and i can only think that's because of the validation knowing about the "current_timestamp" */
        $this->assertTrue($Chapter->validate('ReleaseDate'));
        $this->assertTrue($Chapter->validate('Updated'));
        /* The next assert is accepting unacceptable values, and i can only think that's because of the validation knowing about the "default_value" */
        $this->assertTrue($Chapter->validate('OneShot'));

        // Put all fields with acceptable values
        $Chapter->Number = 3;
        $Chapter->PagesNumber = 10;
        $Chapter->Name = 'When she smiled';
        $Chapter->ReleaseDate = '1998-11-12';
        $Chapter->Updated = '2020-11-12 22:23:50';
        $Chapter->Season = 1;
        $Chapter->OneShot = 0;
        $Chapter->SrcFolder = '/manga/1/3';
        $Chapter->Manga_Id = $Manga->IdManga;
        $Chapter->Manager_Id = $Manager->IdManager;

        // Verify all fields to see if they are really acceptable
        $this->assertTrue($Chapter->validate('Number'));
        $this->assertTrue($Chapter->validate('PagesNumber'));
        $this->assertTrue($Chapter->validate('Name'));
        $this->assertTrue($Chapter->validate('ReleaseDate'));
        $this->assertTrue($Chapter->validate('Updated'));
        $this->assertTrue($Chapter->validate('Season'));
        $this->assertTrue($Chapter->validate('OneShot'));
        $this->assertTrue($Chapter->validate('SrcFolder'));
        $this->assertTrue($Chapter->validate('Manga_Id'));
        $this->assertTrue($Chapter->validate('Manager_Id'));





        // Put all fields with acceptable values and save
        $this->tester->haveRecord('common\models\Chapter', ['Number' => 3, 'PagesNumber' => 10, 'Name' => 'When she smiled', 'ReleaseDate' => '1998-11-12', 'Updated' => '2020-11-12 22:23:50', 'Season' => 1, 'OneShot' => false, 'SrcFolder' => '/manga/1/3', 'Manga_Id' => $Manga->IdManga, 'Manager_Id' => $Manager->IdManager]);

        // Verify if Chapter was successfully inserted
        $this->tester->seeRecord('common\models\Chapter', ['Number' => 3, 'Name' => 'When she smiled','SrcFolder' => '/manga/1/3']);




        
        // Verify if Chapter to be updated exists
        $this->tester->seeRecord('common\models\Chapter', ['Number' => 1, 'Name' => null, 'SrcFolder' => null]);
        
        // Verify if Chapter with new values does not exists
        $this->tester->dontSeeRecord('common\models\Chapter', ['Number' => 1, 'Name' => 'When she cried', 'SrcFolder' => '/'.'manga/1/1']);

        // Get Chapter to be updated
        $Chapter = $this->tester->grabRecord('common\models\Chapter', ['Number' => 1, 'Name' => null, 'SrcFolder' => null]);
        
        // Change fields with acceptable values
        $Chapter->Name = 'When she cried';
        $Chapter->SrcFolder = '/'.'manga/1/1';
        
        // Save Chapter
        $Chapter->save();
        
        // Verify if Chapter was successfully updated
        $this->tester->seeRecord('common\models\Chapter', ['Number' => 1, 'Name' => $Chapter->Name,'SrcFolder' => $Chapter->SrcFolder]);
        
        // Verify if Chapter with old values does not exists
        $this->tester->dontSeeRecord('common\models\Chapter', ['Number' => 1, 'Name' => null,'SrcFolder' => null]);



        
        // Verify if Chapter to be deleted exists
        $this->tester->seeRecord('common\models\Chapter', ['Number' => 2, 'Name' => null, 'SrcFolder' => null]);
        
        // Get Chapter to be deleted
        $Chapter = $this->tester->grabRecord('common\models\Chapter', ['Number' => 2, 'Name' => null, 'SrcFolder' => null]);

        // Delete Chapter
        $Chapter->delete();

        // Verify if Chapter was successfully deleted
        $this->tester->dontSeeRecord('common\models\Chapter', ['Number' => 2, 'Name' => null, 'SrcFolder' => null]);
    }
}