<?php namespace common\tests;

use common\models\Category;

class DBCategoryTest extends \Codeception\Test\Unit
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
    public function testCategoryDBIntegration() 
    {
        // Function created to avoid conflicts with previous tests and data
        // And to make it possible to see the differences that happen with the test

        // Add two records for tests
        $this->tester->haveRecord('common\models\Category', ['Name' => 'English', 'Server' => 'en_US']);
        $this->tester->haveRecord('common\models\Category', ['Name' => 'Portuguese', 'Server' => 'pt_PT']);



        
        // Create new Category
        $Category = new Category;

        // Put all fields null
        $Category->Name = null;
        $Category->Server = null;

        // Verify all fields to see if they accept being null
        $this->assertFalse($Category->validate('Name'));
        
        $this->assertTrue($Category->validate('Server'));

        // Put all fields with unacceptable values
        $Category->Name = 'ItCantHaveMoreThanTwentyCharacters';
        $Category->Server = 'ItCantHaveMoreThanTwentyCharacters';

        // Verify all fields to see if they are really unacceptable
        $this->assertFalse($Category->validate('Name'));
        $this->assertFalse($Category->validate('Server'));

        // Put all fields with acceptable values
        $Category->Name = 'Japanese';
        $Category->Server = 'ja_JP';

        // Verify all fields to see if they are really acceptable
        $this->assertTrue($Category->validate('Name'));
        $this->assertTrue($Category->validate('Server'));





        // Create new Category
        $Category = new Category;
        
        // Put all fields with acceptable values
        $Category->Name = 'Japanese';
        $Category->Server = 'ja_JP';
        
        // Save Category
        $Category->save();

        // Verify if Category was successfully inserted
        $this->tester->seeRecord('common\models\Category', ['Name' => 'Japanese', 'Server' => 'ja_JP']);





        
        // Verify if Category to be updated exists
        $this->tester->seeRecord('common\models\Category', ['Name' => 'Portuguese', 'Server' => 'pt_PT']);
        
        // Verify if Category with new values does not exists
        $this->tester->dontSeeRecord('common\models\Category', ['Name' => 'Portuguese', 'Server' => 'pt_BR']);
        
        // Get Category to be updated
        $Category = $this->tester->grabRecord('common\models\Category', ['Name' => 'Portuguese']);
        
        // Change fields with acceptable values
        $Category->Server = 'pt_BR';
        
        // Save Category
        $Category->save();
        
        // Verify if Category was successfully updated
        $this->tester->seeRecord('common\models\Category', ['Name' => 'Portuguese', 'Server' => 'pt_BR']);

        // Verify if Category with old values does not exists
        $this->tester->dontSeeRecord('common\models\Category', ['Name' => 'Portuguese', 'Server' => 'pt_PT']);






        // Verify if Category to be deleted exists
        $this->tester->seeRecord('common\models\Category', ['Name' => 'English', 'Server' => 'en_US']);
        
        // Get Category to be deleted
        $Category = $this->tester->grabRecord('common\models\Category', ['Name' => 'English', 'Server' => 'en_US']);

        // Delete Category
        $Category->delete();

        // Verify if Category was successfully deleted
        $this->tester->dontSeeRecord('common\models\Category', ['Name' => 'English', 'Server' => 'en_US']);
    }
}