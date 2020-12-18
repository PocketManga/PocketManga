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
    public function testPrepareTable()
    {
        $Authors = Author::find()->all();
        if($Authors){
            foreach ($Authors as $Author){
                $Author->delete();
            }
        }
        $this->tester->haveRecord('common\models\Author', ['FirstName' => 'Edgar', 'LastName' => 'Cordeiro']);
        $this->tester->haveRecord('common\models\Author', ['FirstName' => 'Samuel', 'LastName' => 'Cordeiro']);
    }

    // tests
    public function testValidation()
    {
        $Author = new Author;

        $Author->FirstName = null;
        $Author->LastName = null;

        $this->assertFalse($Author->validate('FirstName'));
        $this->assertTrue($Author->validate('LastName'));

        $Author->FirstName = 'ItCantHaveMoreThanTwentyCharacters';
        $Author->LastName = 'ItCantHaveMoreThanTwentyCharacters';

        $this->assertFalse($Author->validate('FirstName'));
        $this->assertFalse($Author->validate('LastName'));

        $Author->FirstName = 'Edgar';
        $Author->LastName = 'Cordeiro';

        $this->assertTrue($Author->validate('FirstName'));
        $this->assertTrue($Author->validate('LastName'));
    }

    // tests
    public function testInsert()
    {
        // 1st Type
        $Author = new Author;
        
        $Author->FirstName = 'Edgar';
        $Author->LastName = 'First';
        $Author->save();

        $this->tester->seeRecord('common\models\Author', ['FirstName' => 'Edgar', 'LastName' => 'First']);

        // 2nd Type

        $this->tester->haveRecord('common\models\Author', ['FirstName' => 'Edgar', 'LastName' => 'Second']);
        $this->tester->seeRecord('common\models\Author', ['FirstName' => 'Edgar', 'LastName' => 'Second']);
    }

    // tests
    public function testRead()
    {
        $this->tester->seeRecord('common\models\Author', ['FirstName' => 'Edgar', 'LastName' => 'Cordeiro']);
        
        $Author = $this->tester->grabRecord('common\models\Author', ['FirstName' => 'Edgar', 'LastName' => 'Cordeiro']);
        $this->assertEquals('Edgar', $Author->FirstName);
        $this->assertEquals('Cordeiro', $Author->LastName);
    }

    // tests
    public function testUpdate()
    {
        $this->tester->seeRecord('common\models\Author', ['FirstName' => 'Edgar', 'LastName' => 'Cordeiro']);
        
        $Author = $this->tester->grabRecord('common\models\Author', ['FirstName' => 'Edgar', 'LastName' => 'Cordeiro']);
        $Author->FirstName = 'Neuza';
        $Author->save();
        
        $this->tester->seeRecord('common\models\Author', ['FirstName' => 'Neuza', 'LastName' => 'Cordeiro']);
        
        $Author = $this->tester->grabRecord('common\models\Author', ['FirstName' => 'Neuza', 'LastName' => 'Cordeiro']);

        $this->assertEquals('Neuza', $Author->FirstName);
        $this->assertEquals('Cordeiro', $Author->LastName);
    }

    // tests
    public function testDelete()
    {
        $this->tester->seeRecord('common\models\Author', ['FirstName' => 'Samuel', 'LastName' => 'Cordeiro']);
        
        $Author = $this->tester->grabRecord('common\models\Author', ['FirstName' => 'Samuel', 'LastName' => 'Cordeiro']);
        $this->assertEquals('Samuel', $Author->FirstName);

        $Author->delete();
        $this->tester->dontSeeRecord('common\models\Author', ['FirstName' => 'Samuel', 'LastName' => 'Cordeiro']);
    }/** */
}