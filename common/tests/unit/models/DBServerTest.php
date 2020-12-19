<?php namespace common\tests;

use common\models\Server;

class DBServerTest extends \Codeception\Test\Unit
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
        $Servers = Server::find()->all();
        if($Servers){
            foreach ($Servers as $Server){
                $Server->delete();
            }
        }
        
        // Add two records for tests
        $this->tester->haveRecord('common\models\Server', ['Name' => 'English', 'Code' => 'en_US']);
        $this->tester->haveRecord('common\models\Server', ['Name' => 'Portuguese', 'Code' => 'pt_PT']);
    }

    // tests
    public function testValidation()
    {
        // Create new Server
        $Server = new Server;

        // Put all fields null
        $Server->Name = null;
        $Server->Code = null;

        // Verify all fields to see if they accept being null
        $this->assertFalse($Server->validate('Name'));
        $this->assertFalse($Server->validate('Code'));

        // Put all fields with unacceptable values
        $Server->Name = 'ItCantHaveMoreThanTenCharacters';
        $Server->Code = 'ItCantHaveMoreThanTenCharacters';

        // Verify all fields to see if they are really unacceptable
        $this->assertFalse($Server->validate('Name'));
        $this->assertFalse($Server->validate('Code'));

        // Put all fields with acceptable values
        $Server->Name = 'Japanese';
        $Server->Code = 'ja_JP';

        // Verify all fields to see if they are really acceptable
        $this->assertTrue($Server->validate('Name'));
        $this->assertTrue($Server->validate('Code'));
    }

    // tests
    public function testInsert()
    {
        // Create new Server
        $Server = new Server;
        
        // Put all fields with acceptable values
        $Server->Name = 'Japanese';
        $Server->Code = 'ja_JP';
        
        // Save Server
        $Server->save();

        // Verify if Server was successfully inserted
        $this->tester->seeRecord('common\models\Server', ['Name' => 'Japanese', 'Code' => 'ja_JP']);
    }

    // tests
    public function testUpdate()
    {
        // Verify if Server to be updated exists
        $this->tester->seeRecord('common\models\Server', ['Name' => 'Portuguese', 'Code' => 'pt_PT']);
        
        // Verify if Server with new values does not exists
        $this->tester->dontSeeRecord('common\models\Server', ['Name' => 'Portuguese', 'Code' => 'pt_BR']);

        // Get Server to be updated
        $Server = $this->tester->grabRecord('common\models\Server', ['Name' => 'Portuguese', 'Code' => 'pt_PT']);
        
        // Change fields with acceptable values
        $Server->Code = 'pt_BR';
        
        // Save Server
        $Server->save();
        
        // Verify if Server was successfully updated
        $this->tester->seeRecord('common\models\Server', ['Name' => 'Portuguese', 'Code' => 'pt_BR']);
        
        // Verify if Server with old values does not exists
        $this->tester->dontSeeRecord('common\models\Server', ['Name' => 'Portuguese', 'Code' => 'pt_PT']);
    }

    // tests
    public function testDelete()
    {
        // Verify if Server to be deleted exists
        $this->tester->seeRecord('common\models\Server', ['Name' => 'English', 'Code' => 'en_US']);
        
        // Get Server to be deleted
        $Server = $this->tester->grabRecord('common\models\Server', ['Name' => 'English', 'Code' => 'en_US']);

        // Delete Server
        $Server->delete();

        // Verify if Server was successfully deleted
        $this->tester->dontSeeRecord('common\models\Server', ['Name' => 'English', 'Code' => 'en_US']);
    }
}