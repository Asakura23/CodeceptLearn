<?php
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\Remote\RemoteWebElement;
class DmportalCest
{
    public function _before(AcceptanceTester $I)
    {
        $this->login($I);

    }

    public function _after(AcceptanceTester $I)
    {

    }

    public function _failed(AcceptanceTester $I)
    {
        if ($I->tryToSeeElement('.closeSession')) {
            $I->click(['class'=>'closeSession']);
        }
    }
    
    protected function login(AcceptanceTester $I)
    {


        if ($I->loadSessionSnapshot('login')) return;
        $ini_array= parse_ini_file("/app1/tests/_data/config.ini");
        $I->amOnPage('/');
        $login = $ini_array["Login"];
        $pass = $ini_array["Pass"];
        $captcha = $ini_array["Captcha"];
        $sms = $ini_array["Sms"];
        $I->fillField('Логин *', $login);
        $I->fillField('Пароль *', $pass);
        $I->fillField('Код проверки *', $captcha);
        $I->makeScreenshot();
        $I->click('Войти');
        $I->waitForText("Смс код", 10);
        $I->fillField('Смс код *', $sms);
        $I->makeScreenshot();
        $I->click('Войти');
        $I->waitForText("Личный кабинет", 10);//условный маркер логина
        $I->saveSessionSnapshot('login');
        $I->makeScreenshot();
    }

    public function tryToTestP0(AcceptanceTester $I)
    {
        $this->login($I);


    }

    public function tryToTestP1(AcceptanceTester $I)
    {
        $I->wantTo("2. найти ссылку \"Просмотр операций\" и нажать ");
        $I->click('viewOperations');
        $I->waitForText("Экспорт",10);//условный маркер прогрузки страницы
    }

    public function tryToTestP2(AcceptanceTester $I)
    {
        $I->wantTo("3. Проверить что выбран Просмотр операций Проверить что нет ошибок при отображении таблицы ( нет видимых элементов div с классом error )");
        $I->checkVisible(".viewOperations");
        $I->DontSeeElement(".error");
    }

    public function tryToTestP3(AcceptanceTester $I)
    {
        $I->wantTo("4. Проверить что есть таблица Операций");
        $I->checkVisible("table.gridItems.viewOperations");
        $I->wantTo("Проверить что есть данные в таблице");
        $I->waitForElement("table.gridItems.viewOperations tr:not(.filter)");//условный маркер прогрузки таблицы
    }

    public function tryToTestP4(AcceptanceTester $I)
    {
        $I->wantTo("5. Проверить фильтры списки что в их списках больше одной опции (и что есть опция Все)");
        $I->checkVisible("tr.filter");
        foreach ([5,6,9,10,13,14,18] as $indexTd) {
            $I->see("Все",['css'=>"tr.filter td:nth-child({$indexTd})"]);
            $up=$I->grabMultiple("td:nth-child({$indexTd}) select option");
            $I->comparisonGrabText(2,$up);
        }
    }

    public function tryToTestP5(AcceptanceTester $I)
    {
        $I->wantTo("8. Проверить в поле ТСП что в списке больше одной опции (и что есть опция Все)");
        $I->click("//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()//div[contains(@class, 'drop')]");
        $I->see("Все","//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()//div[contains(@class, 'MS_drop')]");
        $up=$I->grabMultiple("//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()//div[contains(@class, 'MS_drop')]//input");
        $I->comparisonGrabText(2,$up);
        $I->makeScreenshot();
    }

    public function tryToTestP6(AcceptanceTester $I)
    {
        $I->wantTo("9. Проверить в поле ТСП Что если опция стоит \"Все\", остальные выбрать нельзя-");
        $I->click("//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()//div[contains(@class, 'MS_drop')]/ul/li[1]/label/span");
        $I->seeCheckboxIsChecked("//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()//div[contains(@class, 'MS_drop')]/ul/li[1]/label/input");
        $up=$I->grabMultiple("//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()//div[contains(@class, 'MS_drop')]/ul/li/label/input","disabled");
        $I->checkEnabledOptionAll($up);//метод вычитает из всех варинтов варианты которые имеют класс disabled и если не равно 1 выкидывает ошибку
        $I->click("//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()//div[contains(@class, 'MS_drop')]/ul/li[1]/label/span");//убирает галку с все для следующего пункта
    }

    public function tryToTestP7(AcceptanceTester $I)
    {
        $I->wantTo("10. Проверить в поле ТСП Снять галку с \"Все\", остальные выбираются (причем работает множественный выбор)-");
        $I->click("//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()//div[contains(@class, 'MS_drop')]/ul/li[2]/label/span");
        $I->click("//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()//div[contains(@class, 'MS_drop')]/ul/li[3]/label/span");
        $I->seeCheckboxIsChecked("//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()//div[contains(@class, 'MS_drop')]/ul/li[2]/label/input");
        $I->seeCheckboxIsChecked("//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()//div[contains(@class, 'MS_drop')]/ul/li[3]/label/input");
        $I->click("//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()//div[contains(@class, 'MS_drop')]/ul/li[2]/label/span");
        $I->click("//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()//div[contains(@class, 'MS_drop')]/ul/li[3]/label/span");
        $I->click("//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()//div[contains(@class, 'drop')]");
    }

    public function tryToTestP8(AcceptanceTester $I)
    {
        $I->wantTo("11. взять из колонки любой tranId, вставить в фильтр по этому полю, нажать найти. Ожидать появления одной строки в таблице но не более 3 сек. Убедиться что также значение прописалось в верхнем поле, а даты очистились");
        $I->waitForText("Элементы 1");//маркер прогрузки таблицы
        $up = $I->grabMultiple("td:nth-child(2) a");
        $I->fillField("td:nth-child(2) input", "$up[3]");
        $I->fillField(".tranID input", "$up[3]");
        $I->click("//div[contains(@class, 'viewOperations')]//div[@class='RGS']//button[@class='action']");
        //$I->click("//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()//div[contains(@class, 'drop')]");//клик для фокуса
        $I->waitForText("Количество элементов на странице", 3);//прогрузка таблицы
       // $I->seeInField(".react-datepicker-ignore-onclickoutside","");
        //$I->seeInField("","");
        $textFilter = $I->grabValueFrom("td:nth-child(2) input");
        $textTranId = $I->grabValueFrom(".tranID input");
        $I->assertEquals($textTranId,$textFilter);
        $I->DontSeeElement( ".tr:nth-child(3)");
    }
    public function tryToTestP9(AcceptanceTester $I)
    {
        $I->wantTo("12. Нажать на ссылку со значением tranId убедиться что в открывшемся окне данные погрузились в течение не более 3сек");
        $I->wait(3);
        $I->click(".tran_id a");
        $I->waitForText("Идентификатор транзакции",3);
        $I->checkVisible(".MP_Window_content");
        $I->click(".do-close");
        $I->fillField("td:nth-child(2) input", "");
        $I->fillField(".tranID input", "");
        $I->click("//div[contains(@class, 'viewOperations')]//div[@class='RGS']//button[@class='action']");
    }
    public function tryToTestP10(AcceptanceTester $I)
    {
        $I->wantTo( "Проверить сортировки полей (нажал и в течение 30 сек данные отобразились и поменялась иконка сортировки в шапке колонки)");
        $I->waitForText("Экспорт");
        $I->click(" .sort");
    }

    public function exit(AcceptanceTester $I)
    {
        if ($I->tryToSeeElement('.closeSession')) {
            $I->click(['class'=>'closeSession']);
        }
    }

}
