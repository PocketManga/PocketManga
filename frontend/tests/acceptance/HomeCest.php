<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Home');
        $I->see('All Manga');
        $I->see('Ongoing');
        $I->see('Completed');

        $I->seeLink('About');
        $I->click('About');
        $I->wait(2);

        $I->see('Projet Developed by: Edgar Oliveira Cordeiro => Nº2180640');
    }
}
