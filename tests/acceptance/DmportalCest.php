<?php
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\Remote\RemoteWebElement;
class DmportalCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->wantTo("залогиниться");
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
        $I->waitForText("Личный кабинет", 10);//условный маркер логина
    }


    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo("найти ссылку \"Просмотр операций\" и нажать ");
        $I->click('viewOperations');
        $I->waitForText("Экспорт",10);//условный маркер прогрузки страницы
        $I->wantTo("Проверить что выбран Просмотр операций Проверить что нет ошибок при отображении таблицы ( нет видимых элементов div с классом error )");
        $I->checkVisible(".viewOperations");
        $I->DontSeeElement(".error");
        $I->wantTo(" Проверить что есть таблица Операций");
        $I->click('viewOperations');
        $I->checkVisible(".gridItems.viewOperations");
        $I->wantTo("Проверить что есть данные в таблице");
        $I->waitForElement(".even");//условный маркер прогрузки таблицы
        $I->seeElement(".even") or $I->seeElement(".odd");
        $I->wantTo("Проверить фильтры списки что в их списках больше одной опции (и что есть опция Все)");
        $I->checkVisible("tr.filter");
        $I->see("Все",['css'=>'tr.filter td:nth-child(5)']);
        $I->see("Все",['css'=>'tr.filter td:nth-child(6)']);
        $I->see("Все",['css'=>'tr.filter td:nth-child(9)']);
        $I->see("Все",['css'=>'tr.filter td:nth-child(10)']);
        $I->see("Все",['css'=>'tr.filter td:nth-child(13)']);
        $I->see("Все",['css'=>'tr.filter td:nth-child(14)']);
        $I->see("Все",['css'=>'tr.filter td:nth-child(18)']);
        $up=$I->grabMultiple("td:nth-child(5) select option");
        $I->comparisonGrabText(2,$up);
        $up=$I->grabMultiple("td:nth-child(6) select option");
        $I->comparisonGrabText(2,$up);
        $up=$I->grabMultiple("td:nth-child(9) select option");
        $I->comparisonGrabText(2,$up);
        $up=$I->grabMultiple("td:nth-child(10) select option");
        $I->comparisonGrabText(2,$up);
        $up=$I->grabMultiple("td:nth-child(13) select option");
        $I->comparisonGrabText(2,$up);
        $up=$I->grabMultiple("td:nth-child(14) select option");
        $I->comparisonGrabText(2,$up);
        $up=$I->grabMultiple("td:nth-child(18) select option");
        $I->comparisonGrabText(2,$up);













    }
}
