<?php namespace backend\tests;

use Yii;
use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use common\fixtures\ManagerFixture;
use common\fixtures\MangaFixture;
use common\fixtures\ServerFixture;

class MangaCest
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
            'mangas' => [
                'class' => MangaFixture::className(),
                'dataFile' => codecept_data_dir() . 'manga_data.php'
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
        
        $MangaViewPost = $auth->createPermission('MangaViewPost');
        $MangaViewPost->description = 'Permission to see manga info';
        $auth->add($MangaViewPost);

        $MangaUpdatePost = $auth->createPermission('MangaUpdatePost');
        $MangaUpdatePost->description = 'Permission to update manga';
        $auth->add($MangaUpdatePost);

        $MangaCreatePost = $auth->createPermission('MangaCreatePost');
        $MangaCreatePost->description = 'Permission to create new manga';
        $auth->add($MangaCreatePost);

        $MangaDeletePost = $auth->createPermission('MangaDeletePost');
        $MangaDeletePost->description = 'Permission to delete manga';
        $auth->add($MangaDeletePost);

        /************************************************************/
        
        $admin = $auth->createRole('admin');
        $auth->add($admin);

        /************************************************************/

        $auth->addChild($admin, $MangaViewPost);
        $auth->addChild($admin, $MangaUpdatePost);
        $auth->addChild($admin, $MangaCreatePost);
        $auth->addChild($admin, $MangaDeletePost);

        /************************************************************/

        $auth->assign($admin, $User->IdUser);
    }


    /**
     * @param FunctionalTester $I
     */
    public function GoToMangaListPage(FunctionalTester $I)
    {
        $I->amOnPage('/manga_list');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Mangas');
    }

    /**
     * @param FunctionalTester $I
     */
    public function CreateNewManga(FunctionalTester $I)
    {
        $I->amOnPage('/manga_list');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Create Manga');
        $I->click('Create Manga');
        $I->fillField('MangaForm[Title]', 'ThisTitle');
        $I->fillField('MangaForm[OriginalTitle]', 'Originaltitle');
        $I->fillField('MangaForm[ReleaseDate]', '17/11/2021');
        $I->fillField('MangaForm[Description]', 'ahahaha');
        $I->see('Save Manga');
        $I->click('Save Manga');
        $I->see('ThisTitle'); 
    }

    /**
     * @param FunctionalTester $I
     */
    public function GoToMangaInfoPage(FunctionalTester $I)
    {
        $I->amOnPage('/manga_list');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Mangas');
        $I->see('Title number 1');
        $I->click('Title number 1');
        $I->see('Title number 1');
        $I->see('Original Title: Original Title number 1');
        $I->see('ReleaseDate: 12/11/1998');
        $I->see('Description: Description number 1');
    }/**/
    /**
     * @param FunctionalTester $I
     */
    public function UpdateAuthorInfo(FunctionalTester $I)
    {
        $I->amOnPage('/manga_list');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Mangas');
        $I->see('Title number 1');
        $I->click('Title number 1');
        $I->see('Update');
        $I->click('Update');
        $I->see('Update Manga:');
        $I->fillField('MangaForm[Title]', 'Title number 2');
        $I->fillField('MangaForm[OriginalTitle]', 'Original Title number 2');
        $I->fillField('MangaForm[Description]', 'My own description');
        $I->see('Save Manga');
        $I->click('Save Manga');
        $I->see('Title number 2');
        $I->see('Original Title: Original Title number 2');
        $I->see('Description: My own description');
    }/**/

    /**
     * @param FunctionalTester $I
     */
    public function DeleteAuthor(FunctionalTester $I)
    {
        $I->amOnPage('/manga_list');
        $I->see('Login');
        $I->fillField('LoginForm[username]', 'Nildgar');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('login-button');
        $I->see('Mangas');
        $I->see('Title number 1');
        $I->click('Title number 1');
        $I->see('Delete');
        $I->click('Delete');
        $I->dontSee('Title number 1');
    }/**/
}