<?php
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\Remote\RemoteWebElement;
class DmportalCest
{
    const TABLEPATH="table.gridItems.viewOperations";
    const TSPPATH="//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()";
    const BUTTONSHOW="//div[contains(@class, 'viewOperations')]//div[@class='RGS']//button[@class='action']";
    const CALENDARPATH="//div[@class='viewOperations']//div[@class='datePeriod']//div[@class='react-datepicker-wrapper']";
    const DATEPICKPATH="//div[@class='viewOperations']//div[@class='datePeriod']//div[@class='react-datepicker__tab-loop']//div[@class='react-datepicker-popper']//div//div[@class='react-datepicker']//div[@class='react-datepicker__month-container']//div[@class='react-datepicker__month']//div[@class='react-datepicker__week']";
    //селектор строки таблицы которая не является строкой с фильтрами
    const STROKANEFILTER=self::TABLEPATH." tr:not(.filter)";
    //селектор третьей строки таблицы
    const TRETYASTROKATABLICI=self::TABLEPATH." tr:nth-child(3)";
    //селектор ввода в TranId в таблице
    const TRANIDTABLICI=self::TABLEPATH." td:nth-child(2) input";
    //селектор столбца таблицы TranId
    const STOLBTRANIDTABLICI=self::TABLEPATH." td:nth-child(2) a";
    //селектор окна данных из клика по TranId
    const DANNIETRANID=".MP_Window_content";
    //кнопка закрытия окна данных из клика по TranId
    const KNOPKAZAKRITIETRANID=".do-close";
    //селектор до блока Экспорт условный показатель прогрузки таблицы=>страницы
    const MPEXPORT="//div[@class='viewOperations']//div[@class='gridItems ']//div[@class='MP_export']";
    //селектор до первого поля выбора даты
    const PERVVIBORCALENDAR=self::DATEPICKPATH."[3]//div[@class='react-datepicker__day react-datepicker__day--";
    //селектор до второго поля выбора даты
    const VTORVIBORCALENDAR=self::DATEPICKPATH."[4]//div[@class='react-datepicker__day react-datepicker__day--";
    //селектор первого поля ввода даты
    const PERVOEPOLEDATI=self::CALENDARPATH."[1]//div[@class='react-datepicker__input-container']//input";
    //селектор второго поля ввода даты
    const VTOROEPOLEDATI=self::CALENDARPATH."[2]//div[@class='react-datepicker__input-container']//input";
    //селектор первого сброса поля даты
    const KNOPKASBROSAPERVPOLEDATI=self::CALENDARPATH."[1]//div[@class='react-datepicker__input-container']//button[@class='react-datepicker__close-icon']";
    //селектор второго сброса поля даты
    const KNOPKASBROSAVTORPOLEDATI=self::CALENDARPATH."[2]//div[@class='react-datepicker__input-container']//button[@class='react-datepicker__close-icon']";
    //кнопка выпадающего списка ТСП
    const KNOPKASPISKATSP=self::TSPPATH."//div[contains(@class, 'drop')]";
    //селектор выпадающего списка ТСП
    const SPISOKTSP=self::TSPPATH."//div[contains(@class, 'MS_drop')]";
    //селектор поля списка ТСП
    const POLETSP=self::SPISOKTSP."//input";
    //кнопка выбора опции Все в поле тсп
    const VIBORVSETSP=self::SPISOKTSP."/ul/li[1]/label/span";
    //селектор проверки выбора опции Все в поле тсп
    const PROVERKAVIBORAVSETSP=self::SPISOKTSP."/ul/li[1]/label/input";
    //селектор проверки выбора второй опции в поле тсп
    const PROVERKAVTORELEMTSP=self::SPISOKTSP."/ul/li[2]/label/input";
    //селектор проверки выбора третьей опции в поле тсп
    const PROVERKATRTIYELEMTSP=self::SPISOKTSP."/ul/li[3]/label/input";
    //селектор опций в поле тсп
    const OPCIITSP=self::SPISOKTSP."/ul/li/label/input";
    //селектор выбора второго элемента в поле тсп
    const VTORELEMENTTSP=self::SPISOKTSP."/ul/li[2]/label/span";
    //селектор выбора третьего элемента в поле тсп
    const TRETIYELEMENTTSP=self::SPISOKTSP."/ul/li[3]/label/span";
    //селектор ID транзакции в верхнем поле
    const TRANIDVERH="//div[@class='viewOperations']//div[@class='tranID']//input";
    //селектор иконки сортировки
    const SELECTORPROVERKISORTIROVKI=".sort.desc, .sort.asc";
    
    public function _before(AcceptanceTester $I)
    {
         if (!$I->loadSessionSnapshot('login')) {
            $this->login($I);
        }
        $this->waitLoading($I);

    }

    public function _after(AcceptanceTester $I)
    {

    }

    // Этот метод срабатывает скорей всего при любом неуспешном тесте(методе)
    // А нам нужно разлогинится вконце всех тестов, Т.к. в след файле тестов может идти авторизация
    public function _failed(AcceptanceTester $I)
    {
        if ($I->tryToSeeElement('.closeSession')) {
            $I->click(['class'=>'closeSession']);
        }
    }
    
    protected function waitLoading(AcceptanceTester $I)
    {
        $I->wait(1);
        while($I->tryToSeeElement('.loader') || $I->tryToSeeElement('.loading')) {
            $I->wait(3);
        }
    }
    
    protected function login(AcceptanceTester $I)
    {

        if ($I->tryToSeeElement('.closeSession')) {
            $I->click(['class'=>'closeSession']);
        }
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

    }

    public function tryToTestP2(AcceptanceTester $I)
    {
        $viewOperations='viewOperations';

        $I->wantTo("2. найти ссылку \"Просмотр операций\" и нажать ");
        $I->click($viewOperations);
        $I->waitForElement( self::STROKANEFILTER,30);//условный маркер прогрузки таблицы
    }

    public function tryToTestP3(AcceptanceTester $I)
    {
        $viewOperations=".viewOperations";
        $error=".error";

        $I->wantTo("3. Проверить что выбран Просмотр операций Проверить что нет ошибок при отображении таблицы ( нет видимых элементов div с классом error )");
        $I->checkVisible($viewOperations);
        $I->DontSeeElement($error);
    }

    public function tryToTestP4(AcceptanceTester $I)
    {
        $I->wantTo("4. Проверить что есть таблица Операций");
        $I->checkVisible(self::TABLEPATH);
        $I->waitForElement( self::MPEXPORT,30);//условный маркер прогрузки таблицы
    }

    public function tryToTestP5(AcceptanceTester $I)
    {
        $textAll="Все";

        $I->wantTo("5. Проверить фильтры списки что в их списках больше одной опции (и что есть опция Все)");
        $I->waitForElement(self::MPEXPORT,30);//условный маркер прогрузки таблицы
        foreach ([5,6,9,10,13,14,18] as $indexTd) {
            $I->see($textAll,['css'=>"tr.filter td:nth-child({$indexTd})"]);
            $up=$I->grabMultiple("td:nth-child({$indexTd}) select option");
            $I->comparisonGrabText(2,$up);
        }
    }

    public function tryToTestP7(AcceptanceTester $I)
    {
        $firstDate="012";
        $secondDate="020";
        $textRaisetime=" .raisetime";
        $textEmpty=" .empty";
        $firstNegativeDate="8383873287";
        $secondNegativeDate="2813712";

        $I->wantTo(" Проверить функционал календаря в полях формы \"Период с .. по ..\" (проверки придумать самому которые бы проверяли роботоспособность календаря)");
        $I->waitForElement(self::MPEXPORT,30);
        $I->click(self::PERVOEPOLEDATI);
        $I->click(self::PERVVIBORCALENDAR."$firstDate']");
        $I->click(self::VTOROEPOLEDATI);
        $I->click(self::VTORVIBORCALENDAR."$secondDate']");
        $I->click(self::BUTTONSHOW);
        $this->waitLoading($I);
        $firstCalendarDate=$I->grabValueFrom(self::PERVOEPOLEDATI);
        $secondCalendarDate=$I->grabValueFrom(self::VTOROEPOLEDATI);
        $I->assertEquals(substr($firstDate,1),substr($firstCalendarDate,8,-9));
        $I->assertEquals(substr($secondDate,1),substr($secondCalendarDate,8,-9));
        $up=$I->grabMultiple(self::TABLEPATH.$textRaisetime);
        foreach ([0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19] as $indexArray){
            if(!((substr($firstDate,1))<=((substr($up[$indexArray],8,-9)))and(substr($secondDate,1))>=(substr($up[$indexArray],8,-9)))){
                PHPUnit\Framework\Assert::fail();
            }
        }
        $I->click(self::KNOPKASBROSAPERVPOLEDATI);
        $I->click(self::KNOPKASBROSAVTORPOLEDATI);
        $I->fillField(self::PERVOEPOLEDATI,$firstNegativeDate);
        $I->fillField(self::VTOROEPOLEDATI,$secondNegativeDate);
        $I->click(self::BUTTONSHOW);
        $this->waitLoading($I);
        $I->checkVisible(self::TABLEPATH.$textEmpty);
        $I->click(self::KNOPKASBROSAPERVPOLEDATI);
        $I->click(self::KNOPKASBROSAVTORPOLEDATI);
        $I->click(self::BUTTONSHOW);

    }

     public function tryToTestP8(AcceptanceTester $I)
    {
        $textAll="Все";

        $I->wantTo("8. Проверить в поле ТСП что в списке больше одной опции (и что есть опция Все)");
        $I->waitForElement(self::MPEXPORT,30);
        $I->click(self::KNOPKASPISKATSP);
        $I->see($textAll,self::SPISOKTSP);
        $up=$I->grabMultiple(self::POLETSP);
        $I->comparisonGrabText(2,$up);
        $I->makeScreenshot();
        $I->click(self::KNOPKASPISKATSP);
    }

    public function tryToTestP9(AcceptanceTester $I)
    {
        $textDisabled="disabled";

        $I->wantTo("9. Проверить в поле ТСП Что если опция стоит \"Все\", остальные выбрать нельзя-");
        $I->waitForElement(self::MPEXPORT,30);
        $I->click(self::KNOPKASPISKATSP);
        $I->click(self::VIBORVSETSP);
        $I->seeCheckboxIsChecked(self::PROVERKAVIBORAVSETSP);
        $up=$I->grabMultiple(self::OPCIITSP,$textDisabled);
        $I->checkEnabledOptionAll($up);//метод вычитает из всех варинтов варианты которые имеют класс disabled и если не равно 1 выкидывает ошибку
        $I->click(self::VIBORVSETSP);//убирает галку с все для следующего пункта
        $I->click(self::KNOPKASPISKATSP);
    }

    public function tryToTestP10(AcceptanceTester $I)
    {
        $I->wantTo("10. Проверить в поле ТСП Снять галку с \"Все\", остальные выбираются (причем работает множественный выбор)-");
        $I->waitForElement(self::MPEXPORT,30);
        $I->click(self::KNOPKASPISKATSP);
        $I->click(self::VTORELEMENTTSP);
        $I->click(self::TRETIYELEMENTTSP);
        $I->seeCheckboxIsChecked(self::PROVERKAVTORELEMTSP);
        $I->seeCheckboxIsChecked(self::PROVERKATRTIYELEMTSP);
        $I->click(self::VTORELEMENTTSP);
        $I->click(self::TRETIYELEMENTTSP);
        $I->click(self::KNOPKASPISKATSP);
    }
    
    public function tryToTestP11(AcceptanceTester $I)
    {
        $I->wantTo("11. взять из колонки любой tranId, вставить в фильтр по этому полю, нажать найти. Ожидать появления одной строки в таблице но не более 3 сек. Убедиться что также значение прописалось в верхнем поле, а даты очистились");
        $I->waitForElement(self::MPEXPORT,30);
        $up=$I->grabMultiple(self::STOLBTRANIDTABLICI);
        $I->fillField(self::TRANIDTABLICI, "$up[3]");
        $I->click(self::BUTTONSHOW);
        $I->waitForElement(self::MPEXPORT, 3);
        $this->waitLoading($I);
        $textFilter=$I->grabValueFrom(self::TRANIDTABLICI);
        $textTranId=$I->grabValueFrom(self::TRANIDVERH);
        $I->assertEquals($textFilter,$textTranId);
        $I->DontSeeElement(self::TRETYASTROKATABLICI);

    }

    public function tryToTestP12(AcceptanceTester $I)
    {
        $textIdentif="Идентификатор транзакции";

        $I->wantTo("12. Нажать на ссылку со значением tranId убедиться что в открывшемся окне данные погрузились в течение не более 3сек");
        $this->waitLoading($I);
        $I->waitForElement(self::TABLEPATH, 3);
        $I->click(self::STOLBTRANIDTABLICI);//
        $I->waitForText($textIdentif,3);
        $I->checkVisible(self::DANNIETRANID);
        $I->click(self::KNOPKAZAKRITIETRANID);
        $I->fillField(self::TRANIDTABLICI, "");
        $I->fillField(self::TRANIDVERH, "");
        $I->click(self::BUTTONSHOW);
    }
    
    public function tryToTestP13(AcceptanceTester $I)
    {
        $I->wantTo( "Проверить сортировки полей (нажал и в течение 30 сек данные отобразились и поменялась иконка сортировки в шапке колонки)");
        $this->waitLoading($I);
        foreach ([2,3,4,5,6,7,8,9,10,11,12,13,14,15,17,18] as $IndexTh){
            $I->click(self::TABLEPATH." th:nth-child({$IndexTh}) a.sort");
            $I->waitForElement(self::MPEXPORT,30);
            $I->checkVisible(self::SELECTORPROVERKISORTIROVKI);
        }
    }
}
