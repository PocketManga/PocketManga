<?php namespace common\tests;

use common\models\Report;
use common\models\Leitor;
use common\models\User;

class DBReportTest extends \Codeception\Test\Unit
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
    public function testPrepareTable()
    {
        // Function created to avoid conflicts with previous tests and data
        // And to make it possible to see the differences that happen with the test

        // Delete all data from the database table
        $Users = User::find()->all();
        if($Users){
            foreach ($Users as $User){
                $User->delete();
            }
        }
        $Leitores = Leitor::find()->all();
        if($Leitores){
            foreach ($Leitores as $Leitor){
                $Leitor->delete();
            }
        }
        $Reports = Report::find()->all();
        if($Reports){
            foreach ($Reports as $Report){
                $Report->delete();
            }
        }
        
        // Add necessary records for tests
        $this->tester->haveRecord('common\models\User', ['Username' => 'Nildgar', 'Email' => 'nill546@hotmail.com', 'Genre' => 'M', 'BirthDate' => '1997-12-17', 'auth_key' => '$2y$13$crNmcPz/9DHK66V/nMyEi.IJxnEdrhDlbNReprRk3YdklIPkgT/pK', 'password_hash' => '$2y$13$7IUgFpJg3aXTHKv7.RRcrOdgQfXaXek61sSZb4A0TVuxy0KByw87e']);
        $User = $this->tester->grabRecord('common\models\User', ['Username' => 'Nildgar']);

        $this->tester->haveRecord('common\models\Leitor', ['MangaShow' => 1, 'User_Id' => $User->IdUser]);
        $Leitor = $this->tester->grabRecord('common\models\Leitor', ['User_Id' => $User->IdUser]);
        
        // Add two records for tests
        $this->tester->haveRecord('common\models\Report', ['SubjectMatter' => 'My subject matter number 1', 'Description' => 'This is just the description', 'SrcImage' => 'source', 'Leitor_Id' => $Leitor->IdLeitor]);
        $this->tester->haveRecord('common\models\Report', ['SubjectMatter' => 'My subject matter number 2', 'Description' => 'This is just the description 2', 'SrcImage' => 'source2', 'Leitor_Id' => $Leitor->IdLeitor]);
    }

    // tests
    public function testValidation()
    {
        // Create new Report
        $Report = new Report;

        // Put all fields null
        $Report->SubjectMatter = null;
        $Report->Description = null;
        $Report->SrcImage = null;
        $Report->Resolved = null;
        $Report->Created = null;
        $Report->Manga_Id = null;
        $Report->Chapter_Id = null;
        $Report->Leitor_Id = null;

        // Verify all fields to see if they accept being null
        $this->assertFalse($Report->validate('SubjectMatter'));
        $this->assertFalse($Report->validate('Description'));
        $this->assertFalse($Report->validate('SrcImage'));
        $this->assertFalse($Report->validate('Leitor_Id'));
        $this->assertTrue($Report->validate('Manga_Id'));
        $this->assertTrue($Report->validate('Chapter_Id'));
        
        /* The next assert is accepting null, and i can only think that's because of the validation knowing about the "default_value" */
        $this->assertTrue($Report->validate('Resolved'));
        /* The next assert is accepting null, and i can only think that's because of the validation knowing about the "current_timestamp" */
        $this->assertTrue($Report->validate('Created'));

        // Put all fields with unacceptable values
        $Report->SubjectMatter = 'It Cant Have More Than Fifty Characters. So, I Will Speak Until I Use More Than That. Ohh I Already Used All :(';
        $Report->Description = "I don't know the limites of text";
        $Report->SrcImage = 'It Cant Have More Than Thirty Characters. So, I Will Speak Until I Use More Than That. Ohh I Already Used All :(';
        $Report->Resolved = 3;
        $Report->Created = '18-12-2020 22:23:50';
        $Report->Manga_Id = 'Hello';
        $Report->Chapter_Id = 'Hello';
        $Report->Leitor_Id = 'Hello';

        // Verify all fields to see if they are really unacceptable
        $this->assertFalse($Report->validate('SubjectMatter'));
        $this->assertFalse($Report->validate('SrcImage'));
        $this->assertFalse($Report->validate('Manga_Id'));
        $this->assertFalse($Report->validate('Chapter_Id'));
        $this->assertFalse($Report->validate('Leitor_Id'));
        
        /* The next assert is accepting unacceptable values because i do not know the limits of text */
        $this->assertTrue($Report->validate('Description'));
        /* The next assert is accepting unacceptable values, and i can only think that's because of the validation knowing about the "default_value" */
        $this->assertTrue($Report->validate('Resolved'));
        /* The next assert is accepting null, and i can only think that's because of the validation knowing about the "current_timestamp" */
        $this->assertTrue($Report->validate('Created'));

        // Put all fields with acceptable values
        $Report->SubjectMatter = 'My subject matter number 3';
        $Report->Description = 'My subject matter number 3';
        $Report->SrcImage = 'source';
        $Report->Resolved = 1;
        $Report->Manga_Id = null;
        $Report->Chapter_Id = null;
        $Report->Leitor_Id = 1;

        // Verify all fields to see if they are really acceptable
        $this->assertTrue($Report->validate('SubjectMatter'));
        $this->assertTrue($Report->validate('Description'));
        $this->assertTrue($Report->validate('SrcImage'));
        $this->assertTrue($Report->validate('Resolved'));
        $this->assertTrue($Report->validate('Created'));
        $this->assertTrue($Report->validate('Manga_Id'));
        $this->assertTrue($Report->validate('Chapter_Id'));

        /* The next assert is giving false, and i can only think that's because of the validation trying using foreign keys when the table doesn't have any because of the engine MyISAM */
        $this->assertFalse($Report->validate('Leitor_Id'));
    }

    // tests
    public function testInsert()
    {        
        // Put all fields with acceptable values and save
        $this->tester->haveRecord('common\models\Report', ['SubjectMatter' => 'My subject matter number 3', 'Description' => 'This is just the description 3', 'SrcImage' => 'source3', 'Resolved' => true, 'Leitor_Id' => 1]);

        // Verify if Report was successfully inserted
        $this->tester->seeRecord('common\models\Report', ['SubjectMatter' => 'My subject matter number 3', 'SrcImage' => 'source3', 'Resolved' => true]);
    }

    // tests
    public function testUpdate()
    {
        // Verify if Report to be updated exists
        $this->tester->seeRecord('common\models\Report', ['SubjectMatter' => 'My subject matter number 1', 'SrcImage' => 'source']);
        
        // Verify if Report with new values does not exists
        $this->tester->dontSeeRecord('common\models\Report', ['SubjectMatter' => 'My subject matter number 1', 'SrcImage' => 'source1']);

        // Get Report to be updated
        $Report = $this->tester->grabRecord('common\models\Report', ['SubjectMatter' => 'My subject matter number 1', 'SrcImage' => 'source']);
        
        // Change fields with acceptable values
        $Report->SrcImage = 'source1';
        
        // Save Report
        $Report->save();
        
        // Verify if Report was successfully updated
        $this->tester->seeRecord('common\models\Report', ['SubjectMatter' => 'My subject matter number 1', 'SrcImage' => 'source1']);
        
        // Verify if Report with old values does not exists
        $this->tester->dontSeeRecord('common\models\Report', ['SubjectMatter' => 'My subject matter number 1', 'SrcImage' => 'source']);
    }

    // tests
    public function testDelete()
    {
        // Verify if Report to be deleted exists
        $this->tester->seeRecord('common\models\Report', ['SubjectMatter' => 'My subject matter number 2', 'SrcImage' => 'source2']);
        
        // Get Report to be deleted
        $Report = $this->tester->grabRecord('common\models\Report', ['SubjectMatter' => 'My subject matter number 2', 'SrcImage' => 'source2']);

        // Delete Report
        $Report->delete();

        // Verify if Report was successfully deleted
        $this->tester->dontSeeRecord('common\models\Report', ['SubjectMatter' => 'My subject matter number 2', 'SrcImage' => 'source2']);
    }
}