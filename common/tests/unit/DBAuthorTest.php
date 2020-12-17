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
        $Author = new Author;
        
        $Author->FirstName = 'Edgar';
        $Author->LastName = 'Cordeiro';
        $Author->save();

        $id = $this->tester->haveRecord('common\models\Author', ['FirstName' => 'Edgar2']);
        
        $author = Author::find($id)->one();
        $this->assertEquals('Edgar2', $author->FirstName);

        $this->tester->seeRecord('common\models\Author', ['FirstName' => 'Edgar']);
    }

    // tests
    public function testRead()
    {

    }

    // tests
    public function testUpdate()
    {

    }

    // tests
    public function testDelete()
    {

    }
}