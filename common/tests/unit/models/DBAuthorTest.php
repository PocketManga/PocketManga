<?php namespace common\tests;

use common\models\Author;

class DBAuthorTest extends \Codeception\Test\Unit
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
    public function testAuthorDBIntegration()
    {
        // Function created to avoid conflicts with previous tests and data
        // And to make it possible to see the differences that happen with the test
        
        // Add two records for tests
        $this->tester->haveRecord('common\models\Author', ['FirstName' => 'Edgar', 'LastName' => 'Cordeiro']);
        $this->tester->haveRecord('common\models\Author', ['FirstName' => 'Samuel', 'LastName' => 'Cordeiro']);


        
        // Create new Author
        $Author = new Author;

        // Put all fields null
        $Author->FirstName = null;
        $Author->LastName = null;

        // Verify all fields to see if they accept being null
        $this->assertFalse($Author->validate('FirstName'));
        
        $this->assertTrue($Author->validate('LastName'));

        // Put all fields with unacceptable values
        $Author->FirstName = 'ItCantHaveMoreThanTwentyCharacters';
        $Author->LastName = 'ItCantHaveMoreThanTwentyCharacters';

        // Verify all fields to see if they are really unacceptable
        $this->assertFalse($Author->validate('FirstName'));
        $this->assertFalse($Author->validate('LastName'));

        // Put all fields with acceptable values
        $Author->FirstName = 'Edgar';
        $Author->LastName = 'Cordeiro';

        // Verify all fields to see if they are really acceptable
        $this->assertTrue($Author->validate('FirstName'));
        $this->assertTrue($Author->validate('LastName'));




        
        // Create new Author
        $Author = new Author;
        
        // Put all fields with acceptable values
        $Author->FirstName = 'Edgar';
        $Author->LastName = 'First';
        
        // Save Author
        $Author->save();

        // Verify if Author was successfully inserted
        $this->tester->seeRecord('common\models\Author', ['FirstName' => 'Edgar', 'LastName' => 'First']);



        
        // Verify if Author to be updated exists
        $this->tester->seeRecord('common\models\Author', ['FirstName' => 'Edgar', 'LastName' => 'Cordeiro']);
        
        // Verify if Author with new values does not exists
        $this->tester->dontSeeRecord('common\models\Author', ['FirstName' => 'Neuza', 'LastName' => 'Cordeiro']);

        // Get Author to be updated
        $Author = $this->tester->grabRecord('common\models\Author', ['FirstName' => 'Edgar', 'LastName' => 'Cordeiro']);
        
        // Change fields with acceptable values
        $Author->FirstName = 'Neuza';
        
        // Save Author
        $Author->save();
        
        // Verify if Author was successfully updated
        $this->tester->seeRecord('common\models\Author', ['FirstName' => 'Neuza', 'LastName' => 'Cordeiro']);
        
        // Verify if Author with old values does not exists
        $this->tester->dontSeeRecord('common\models\Author', ['FirstName' => 'Edgar', 'LastName' => 'Cordeiro']);



        
        // Verify if Author to be deleted exists
        $this->tester->seeRecord('common\models\Author', ['FirstName' => 'Samuel', 'LastName' => 'Cordeiro']);
        
        // Get Author to be deleted
        $Author = $this->tester->grabRecord('common\models\Author', ['FirstName' => 'Samuel', 'LastName' => 'Cordeiro']);

        // Delete Author
        $Author->delete();

        // Verify if Author was successfully deleted
        $this->tester->dontSeeRecord('common\models\Author', ['FirstName' => 'Samuel', 'LastName' => 'Cordeiro']);
    }
}