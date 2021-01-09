<?php namespace backend\tests;

use Yii;
use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use common\fixtures\ManagerFixture;
use common\fixtures\AuthorFixture;

class AuthorCest
{
    public function _fixtures()
    {
        return [
            'users' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user_data.php'
            ],
            'managers' => [
                'class' => ManagerFixture::className(),
                'dataFile' => codecept_data_dir() . 'manager_data.php'
            ],
            'authors' => [
                'class' => AuthorFixture::className(),
                'dataFile' => codecept_data_dir() . 'author_data.php'
            ]
        ];
    }

    public function _before(FunctionalTester $I)
    {
        $User = $I->grabFixture('users', 0);
        $auth = Yii::$app->authManager;

        /************************************************************/
        
        $ViewPost = $auth->createPermission('ViewPost');
        $ViewPost->description = 'Permission to view';
        $auth->add($ViewPost);

        $UpdatePost = $auth->createPermission('UpdatePost');
        $UpdatePost->description = 'Permission to update';
        $auth->add($UpdatePost);

        $CreatePost = $auth->createPermission('CreatePost');
        $CreatePost->description = 'Permission to create';
        $auth->add($CreatePost);

        $DeletePost = $auth->createPermission('DeletePost');
        $DeletePost->description = 'Permission to delete';
        $auth->add($DeletePost);

        /************************************************************/
        
        $admin = $auth->createRole('admin');
        $auth->add($admin);

        /************************************************************/
        
        $auth->addChild($admin, $ViewPost);
        $auth->addChild($admin, $UpdatePost);
        $auth->addChild($admin, $CreatePost);
        $auth->addChild($admin, $DeletePost);

        /************************************************************/

        $auth->assign($admin, $User->IdUser);
    }

    /**
     * @param FunctionalTester $I
     */
    public function GoToAuthorListPage(FunctionalTester $I)
    {       
        $I->amOnPage('/author_list');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Authors');
    }

    /**
     * @param FunctionalTester $I
     */
    public function CreateNewAuthor(FunctionalTester $I)
    {
        $I->amOnPage('/author_list');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Create Author');
        $I->click('Create Author');
        $I->fillField('Author[FirstName]', 'Mashiro');
        $I->fillField('Author[LastName]', 'Shiro');
        $I->see('Save Author');
        $I->click('Save Author');
        $I->see('Mashiro Shiro');
    }

    /**
     * @param FunctionalTester $I
     */
    public function GoToAuthorInfoPage(FunctionalTester $I)
    {
        $I->amOnPage('/author_list');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Authors');
        $I->see('Mashiro Shiro');
        $I->click('Mashiro Shiro');
        $I->see('First Name: Mashiro');
        $I->see('Last Name: Shiro');
    }

    /**
     * @param FunctionalTester $I
     */
    public function UpdateAuthorInfo(FunctionalTester $I)
    {
        $I->amOnPage('/author_list');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Authors');
        $I->see('Mashiro Shiro');
        $I->click('Mashiro Shiro');
        $I->see('Update');
        $I->click('Update');
        $I->see('Update Author:');
        $I->fillField('Author[FirstName]', 'Nagisa');
        $I->see('Save Author');
        $I->click('Save Author');
        $I->see('Nagisa Shiro');
    }

    /**
     * @param FunctionalTester $I
     */
    public function DeleteAuthor(FunctionalTester $I)
    {
        $I->amOnPage('/author_list');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Authors');
        $I->see('Mashiro Shiro');
        $I->click('Mashiro Shiro');
        $I->see('Delete');
        $I->click('Delete');
        $I->dontSee('Mashiro Shiro');
    }
}