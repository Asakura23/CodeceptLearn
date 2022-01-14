<?php
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\Remote\RemoteWebElement;
class dmportalCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->wantTo('check sign in');
        $ini_array = parse_ini_file("Dat.ini");
        $I->amOnPage('/');
        $login = $ini_array["Login"];
        $pass = $ini_array["Pass"];
        $captcha = $ini_array["Captcha"];
        $sms = $ini_array["Sms"];
        $I->fillField('Логин *', $login);
        $I->fillField('Пароль *', $pass);
        $I->fillField('Код проверки *', $captcha);
        $I->click('Войти');
        $I->waitForText("Смс код", 10);
        $I->fillField('Смс код *', $sms);
        $I->click('Войти');
        $I->waitForText("Личный кабинет", 10);
    }


    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo("check divs");
        $I->click('viewOperations');
        $I->waitForText("Экспорт",10);
        $I->checkVisible(".viewOperations");
        $I->DontSeeElement(".error");
    }
}
