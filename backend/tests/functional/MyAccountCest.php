<?php 

namespace backend\tests\functional;

use Yii;
use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use common\fixtures\ManagerFixture;

class MyAccountCest
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
            ]
        ];
    }

    public function _before(FunctionalTester $I)
    {
        $User = $I->grabFixture('users', 0);
        $auth = Yii::$app->authManager;

        /************************************************************/

        $UserViewPost = $auth->createPermission('UserViewPost');
        $UserViewPost->description = 'Permission to see user info';
        $auth->add($UserViewPost);

        $UserUpdatePost = $auth->createPermission('UserUpdatePost');
        $UserUpdatePost->description = 'Permission to update user status';
        $auth->add($UserUpdatePost);

        $UserCreatePost = $auth->createPermission('UserCreatePost');
        $UserCreatePost->description = 'Permission to create new manager user';
        $auth->add($UserCreatePost);

        $UserDeletePost = $auth->createPermission('UserDeletePost');
        $UserDeletePost->description = 'Permission to delete user';
        $auth->add($UserDeletePost);

        /************************************************************/
        
        $admin = $auth->createRole('admin');
        $auth->add($admin);

        /************************************************************/
        
        $auth->addChild($admin, $UserViewPost);
        $auth->addChild($admin, $UserUpdatePost);
        $auth->addChild($admin, $UserCreatePost);
        $auth->addChild($admin, $UserDeletePost);

        /************************************************************/

        $auth->assign($admin, $User->IdUser);
    }

    /**
     * @param FunctionalTester $I
     */
    public function GoToMyAccount(FunctionalTester $I)
    {
        $I->amOnPage('/my_account');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Nildgar');
        $I->click('#button-myaccount');
        $I->see('My Account');
        $I->see('Username: Nildgar');
        $I->see('Email: nill546@hotmail.com');
        $I->see('Gender: Man');
        $I->see('Birth Date: 17/12/1997');
        $I->see('Theme: Dark');
    }
}