<?php

class DmportalCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('check');
        $ini_array= parse_ini_file("Dat.ini");
        $I->amOnPage('/');
        codecept_debug($ini_array);
        $login=$ini_array["Login"];
        $pass=$ini_array["Pass"];
        $captcha=$ini_array["Captcha"];
        $sms=$ini_array["Sms"];
        $I->fillField('Логин *', $login);
        $I->fillField('Пароль *', $pass);
        $I->fillField('Код проверки *', $captcha);
        $I->click('Войти');
        $I->wait(3);
        $I->fillField('Смс код *', $sms);
        $I->click('Войти');
        $I->amOnPage('/');
        $I->wait(4);
        $I->click('viewOperations');
        $I->amOnPage('/?page=viewOperations');


    }
}
