<?php

namespace backend\tests\functional;

use Yii;
use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use common\fixtures\ManagerFixture;

/**
 * Class LoginCest
 */
class LoginCest
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
        
        $admin = $auth->createRole('admin');
        $auth->add($admin);

        /************************************************************/

        $auth->assign($admin, $User->IdUser);
    }
    
    /**
     * @param FunctionalTester $I
     */
    public function loginManager(FunctionalTester $I)
    {
        $I->wantTo('Login do manager');
        $I->amOnPage('/');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Nildgar');
    }
    
    /**
     * @param FunctionalTester $I
     */
    public function loginLeitor(FunctionalTester $I)
    {
        $I->wantTo('Tentativa de login do leitor');
        $I->amOnPage('/');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Popcorn');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Login');
    }
}
