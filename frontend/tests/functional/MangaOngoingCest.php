<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class MangaOngoingCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function CheckOngoingPage(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->see('Ongoing','.text-color2');
        $I->click('Ongoing','.nav-item');
        $I->see('Ongoing','.text-color3');
    }
}
