<?php namespace common\tests;

use common\models\LibraryList;

class DBLibraryListTest extends \Codeception\Test\Unit
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
        $LibraryLists = LibraryList::find()->all();
        if($LibraryLists){
            foreach ($LibraryLists as $LibraryList){
                $LibraryList->delete();
            }
        }
        
        // Add two records for tests
        $this->tester->haveRecord('common\models\LibraryList', ['Name' => 'To See']);
        $this->tester->haveRecord('common\models\LibraryList', ['Name' => 'Completed']);
    }

    // tests
    public function testValidation()
    {
        // Create new LibraryList
        $LibraryList = new LibraryList;

        // Put all fields null
        $LibraryList->Name = null;

        // Verify all fields to see if they accept being null
        $this->assertFalse($LibraryList->validate('Name'));

        // Put all fields with unacceptable values
        $LibraryList->Name = 'ItCantHaveMoreThanTwentyCharacters';

        // Verify all fields to see if they are really unacceptable
        $this->assertFalse($LibraryList->validate('Name'));

        // Put all fields with acceptable values
        $LibraryList->Name = 'Folowing';

        // Verify all fields to see if they are really acceptable
        $this->assertTrue($LibraryList->validate('Name'));
    }

    // tests
    public function testInsert()
    {
        // Create new LibraryList
        $LibraryList = new LibraryList;
        
        // Put all fields with acceptable values
        $LibraryList->Name = 'Folowing';
        
        // Save LibraryList
        $LibraryList->save();

        // Verify if LibraryList was successfully inserted
        $this->tester->seeRecord('common\models\LibraryList', ['Name' => 'Folowing']);
    }

    // tests
    public function testUpdate()
    {
        // Verify if LibraryList to be updated exists
        $this->tester->seeRecord('common\models\LibraryList', ['Name' => 'To See']);
        
        // Verify if LibraryList with new values does not exists
        $this->tester->dontSeeRecord('common\models\LibraryList', ['Name' => 'Saw']);

        // Get LibraryList to be updated
        $LibraryList = $this->tester->grabRecord('common\models\LibraryList', ['Name' => 'To See']);
        
        // Change fields with acceptable values
        $LibraryList->Name = 'Saw';
        
        // Save LibraryList
        $LibraryList->save();
        
        // Verify if LibraryList was successfully updated
        $this->tester->seeRecord('common\models\LibraryList', ['Name' => 'Saw']);
        
        // Verify if LibraryList with old values does not exists
        $this->tester->dontSeeRecord('common\models\LibraryList', ['Name' => 'To See']);
    }

    // tests
    public function testDelete()
    {
        // Verify if LibraryList to be deleted exists
        $this->tester->seeRecord('common\models\LibraryList', ['Name' => 'Completed']);
        
        // Get LibraryList to be deleted
        $LibraryList = $this->tester->grabRecord('common\models\LibraryList', ['Name' => 'Completed']);

        // Delete LibraryList
        $LibraryList->delete();

        // Verify if LibraryList was successfully deleted
        $this->tester->dontSeeRecord('common\models\LibraryList', ['Name' => 'Completed']);
    }
}