<?php namespace backend\tests;

use Yii;
use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use common\fixtures\ManagerFixture;
use common\fixtures\ServerFixture;

class ServerCest
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
            'servers' => [
                'class' => ServerFixture::className(),
                'dataFile' => codecept_data_dir() . 'server_data.php'
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
        $I->amOnPage('/server_list');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Servers');
    }

    /**
     * @param FunctionalTester $I
     */
    public function CreateNewAuthor(FunctionalTester $I)
    {
        $I->amOnPage('/server_list');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Create Server');
        $I->click('Create Server');
        $I->fillField('Server[Name]', 'American');
        $I->fillField('Server[Code]', 'am_An');
        $I->see('Save Server');
        $I->click('Save Server');
        $I->see('American');
    }

    /**
     * @param FunctionalTester $I
     */
    public function GoToAuthorInfoPage(FunctionalTester $I)
    {
        $I->amOnPage('/server_list');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Servers');
        $I->see('Portuguese');
        $I->click('Portuguese');
        $I->see('Name: Portuguese');
        $I->see('Code: pt_PT');
    }

    /**
     * @param FunctionalTester $I
     */
    public function UpdateAuthorInfo(FunctionalTester $I)
    {
        $I->amOnPage('/server_list');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Servers');
        $I->see('Portuguese');
        $I->click('Portuguese');
        $I->see('Update');
        $I->click('Update');
        $I->see('Update Server:');
        $I->fillField('Server[Name]', 'Brasil');
        $I->fillField('Server[Code]', 'pt_BR');
        $I->see('Save Server');
        $I->click('Save Server');
        $I->see('Brasil');
    }

    /**
     * @param FunctionalTester $I
     */
    public function DeleteAuthor(FunctionalTester $I)
    {
        $I->amOnPage('/server_list');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Servers');
        $I->see('Portuguese');
        $I->click('Portuguese');
        $I->see('Delete');
        $I->click('Delete');
        $I->dontSee('Portuguese');
    }
}