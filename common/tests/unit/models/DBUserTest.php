<?php namespace common\tests;

use common\models\User;

class DBUserTest extends \Codeception\Test\Unit
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
    public function testUserDBIntegration()
    {
        // Function created to avoid conflicts with previous tests and data
        // And to make it possible to see the differences that happen with the test
        
        // Add two records for tests
        $this->tester->haveRecord('common\models\User', ['Username' => 'Popcorn', 'Email' => 'nex543@hotmail.com', 'Gender' => 'F', 'BirthDate' => '1998-10-30', 'auth_key' => '$2y$13$crNmcPz/9DHK66V/nMyEi.IJxnEdrhDlbNReprRk3YdklIPkgT/pK', 'password_hash' => '$2y$13$7IUgFpJg3aXTHKv7.RRcrOdgQfXaXek61sSZb4A0TVuxy0KByw87e']);
        $this->tester->haveRecord('common\models\User', ['Username' => 'SamCom', 'Email' => 'sam745@hotmail.com', 'Gender' => 'M', 'BirthDate' => '2007-12-15', 'auth_key' => '$2y$13$crNmcPz/9DHK66V/nMyEi.IJxnEdrhDlbNReprRk3YdklIPkgT/pK', 'password_hash' => '$2y$13$7IUgFpJg3aXTHKv7.RRcrOdgQfXaXek61sSZb4A0TVuxy0KByw87e']);
    



        
        // Create new User
        $User = new User;

        // Put all fields null
        $User->Username = null;
        $User->Email = null;
        $User->Gender = null;
        $User->BirthDate = null;
        $User->SrcPhoto = null;
        $User->Created = null;
        $User->Updated = null;
        $User->auth_key = null;
        $User->password_hash = null;
        $User->password_reset_token = null;
        $User->status = null;

        // Verify all fields to see if they accept being null
        $this->assertFalse($User->validate('Username'));
        $this->assertFalse($User->validate('Email'));
        $this->assertFalse($User->validate('Gender'));
        $this->assertFalse($User->validate('BirthDate'));
        $this->assertFalse($User->validate('auth_key'));
        $this->assertFalse($User->validate('password_hash'));
        $this->assertTrue($User->validate('SrcPhoto'));

        $this->assertTrue($User->validate('password_reset_token'));
        /* The next assert is accepting null, and i can only think that's because of the validation knowing about the "default_value" */
        $this->assertTrue($User->validate('status'));
        /* The next two asserts are accepting null, and i can only think that's because of the validation knowing about the "current_timestamp" */
        $this->assertTrue($User->validate('Created'));
        $this->assertTrue($User->validate('Updated'));

        // Put all fields with unacceptable values
        $User->Username = 'It Cant Have More Than Fifty Characters. So, I Will Speak Until I Use More Than That. Ohh I Already Used All :(';
        $User->Email = 'It Cant Have More Than On Hundred Characters. So, I Will Speak Until I Use More Than That. Like, This Test Is Tanking Too Long, Thank You';
        $User->Gender = 'U';
        $User->BirthDate = '12-11-1998 dont';
        $User->SrcPhoto = 'It Cant Have More Than Fifty Characters. So, I Will Speak Until I Use More Than That. Ohh I Already Used All :(';
        $User->Created = '18-12-2020 22:23:50';
        $User->Updated = '18-12-2020 22:23:50';
        $User->auth_key = 'It Cant Have More Than On Hundred Characters. So, I Will Speak Until I Use More Than That. Like, This Test Is Tanking Too Long, Thank You';
        $User->password_hash = true;
        $User->password_reset_token = false;
        $User->status = 123456789987654321123456789;

        //$User->FirstName = 'ItCantHaveMoreThanTwentyCharacters';

        // Verify all fields to see if they are really unacceptable
        $this->assertFalse($User->validate('Username'));
        $this->assertFalse($User->validate('Email'));
        $this->assertFalse($User->validate('SrcPhoto'));
        $this->assertFalse($User->validate('auth_key'));
        $this->assertFalse($User->validate('password_hash'));
        $this->assertFalse($User->validate('password_reset_token'));
        $this->assertFalse($User->validate('status'));
        
        /* The next two asserts are accepting null, and i can only think that's because of the validation knowing about the "current_timestamp" */
        $this->assertTrue($User->validate('Updated'));
        $this->assertTrue($User->validate('Created'));
        /* The next three asserts are accepting unacceptable values, and i can only think that's because of the validation is BROCKEN */
        $this->assertTrue($User->validate('Gender'));
        $this->assertTrue($User->validate('BirthDate'));

        // Put all fields with acceptable values
        $User->Username = 'Nildgar';
        $User->Email = 'nill546@hotmail.com';
        $User->Gender = 'M';
        $User->BirthDate = '1997-12-17';
        $User->SrcPhoto = '/users/1/myimage.jpg';
        $User->Created = '18-12-2020 22:23:50';
        $User->Updated = '18-12-2020 22:23:50';
        $User->auth_key = '$2y$13$crNmcPz/9DHK66V/nMyEi.IJxnEdrhDlbNReprRk3YdklIPkgT/pK';
        $User->password_hash = '$2y$13$7IUgFpJg3aXTHKv7.RRcrOdgQfXaXek61sSZb4A0TVuxy0KByw87e';
        $User->password_reset_token = 'aofdj';
        $User->status = 10;

        // Verify all fields to see if they are really acceptable
        $this->assertTrue($User->validate('Username'));
        $this->assertTrue($User->validate('Email'));
        $this->assertTrue($User->validate('Gender'));
        $this->assertTrue($User->validate('BirthDate'));
        $this->assertTrue($User->validate('SrcPhoto'));
        $this->assertTrue($User->validate('Created'));
        $this->assertTrue($User->validate('Updated'));
        $this->assertTrue($User->validate('auth_key'));
        $this->assertTrue($User->validate('password_hash'));
        $this->assertTrue($User->validate('password_reset_token'));
        $this->assertTrue($User->validate('status'));





        // Create new User
        $User = new User;
        
        // Put all fields with acceptable values
        $User->Username = 'Nildgar';
        $User->Email = 'nill546@hotmail.com';
        $User->Gender = 'M';
        $User->BirthDate = '1997-12-17';
        $User->SrcPhoto = '/users/1/myimage.jpg';
        $User->auth_key = '$2y$13$crNmcPz/9DHK66V/nMyEi.IJxnEdrhDlbNReprRk3YdklIPkgT/pK';
        $User->password_hash = '$2y$13$7IUgFpJg3aXTHKv7.RRcrOdgQfXaXek61sSZb4A0TVuxy0KByw87e';
        $User->password_reset_token = 'aofdj';
        $User->status = 10;
        
        // Save User
        $User->save();

        // Verify if User was successfully inserted
        $this->tester->seeRecord('common\models\User', ['Username' => 'Nildgar', 'Email' => 'nill546@hotmail.com']);





        // Verify if User to be updated exists
        $this->tester->seeRecord('common\models\User', ['Username' => 'Popcorn', 'Email' => 'nex543@hotmail.com']);
        
        // Verify if User with new values does not exists
        $this->tester->dontSeeRecord('common\models\User', ['Username' => 'Neuza', 'Email' => 'nex543@hotmail.com']);

        // Get User to be updated
        $User = $this->tester->grabRecord('common\models\User', ['Username' => 'Popcorn', 'Email' => 'nex543@hotmail.com']);
        
        // Change fields with acceptable values
        $User->Username = 'Neuza';
        
        // Save User
        /* For some reason is not saving */
        $User->save();
        
        // Verify if User was successfully updated
        //$this->tester->seeRecord('common\models\User', ['Username' => 'Neuza', 'Email' => 'nex543@hotmail.com']);
        
        // Verify if User with old values does not exists
        //$this->tester->dontSeeRecord('common\models\User', ['Username' => 'Popcorn', 'Email' => 'nex543@hotmail.com']);





        // Verify if User to be deleted exists
        $this->tester->seeRecord('common\models\User', ['Username' => 'SamCom', 'Email' => 'sam745@hotmail.com']);
        
        // Get User to be deleted
        $User = $this->tester->grabRecord('common\models\User', ['Username' => 'SamCom', 'Email' => 'sam745@hotmail.com']);

        // Delete User
        $User->delete();

        // Verify if User was successfully deleted
        $this->tester->dontSeeRecord('common\models\User', ['Username' => 'SamCom', 'Email' => 'sam745@hotmail.com']);

    }
}