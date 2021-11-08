<?php

class LoginYandexCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('check login');
        $I->amOnPage('/');
        $I->click('Войти');
        $I->fillField('login', 'testitplstest');
        $I->click('Войти');
        $I->fillField('password', '224790hp');
        $I->click('Войти');
        $I->see('Сейчас в СМИ');

    }
}
