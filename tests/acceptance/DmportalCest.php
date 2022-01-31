<?php

class DmportalCest

{
    //селектор до таблицы
    const TABLE_PATH="table.gridItems.viewOperations";
    //общая часть селектора до ТСП
    const TSP_PATH="//div[contains(@class, 'viewOperations')]//div[@class='RGS']//label[normalize-space(text()) = 'ТСП']/following-sibling::node()";
    //селектор кнопки показать
    const BUTTON_SHOW="//div[contains(@class, 'viewOperations')]//div[@class='RGS']//button[@class='action']";
    //общая часть селектора до календаря
    const CALENDAR_PATH="//div[@class='viewOperations']//div[@class='datePeriod']//div[@class='react-datepicker-wrapper']";
    //общая часть селектора до выбора дат в календаре
    const DATE_PICK_PATH="//div[@class='viewOperations']//div[@class='datePeriod']//div[@class='react-datepicker__tab-loop']//div[@class='react-datepicker-popper']//div//div[@class='react-datepicker']//div[@class='react-datepicker__month-container']//div[@class='react-datepicker__month']//div[@class='react-datepicker__week']";
    //селектор строки таблицы которая не является строкой с фильтрами
    const STROKA_NE_FILTER=self::TABLE_PATH." tr:not(.filter)";
    //селектор третьей строки таблицы
    const TRETYA_STROKA_TABLICI=self::TABLE_PATH." tr:nth-child(3)";
    //селектор ввода в TranId в таблице
    const TRANID_TABLICI=self::TABLE_PATH." td:nth-child(2) input";
    //селектор столбца таблицы TranId
    const STOLB_TRANID_TABLICI=self::TABLE_PATH." td:nth-child(2) a";
    //селектор окна данных из клика по TranId
    const DANNIE_TRANID=".MP_Window_content";
    //кнопка закрытия окна данных из клика по TranId
    const KNOPKA_ZAKRITIE_TRANID=".do-close";
    //селектор до блока Экспорт условный показатель прогрузки таблицы=>страницы
    const MP_EXPORT="//div[@class='viewOperations']//div[@class='gridItems ']//div[@class='MP_export']";
    //селектор до первого поля выбора даты
    const PERV_VIBOR_CALENDAR=self::DATE_PICK_PATH."//div[contains(@class,'react-datepicker__day react-datepicker__day--{firstDate}')]";
    //селектор до второго поля выбора даты
    const VTOR_VIBOR_CALENDAR=self::DATE_PICK_PATH."//div[contains(@class,'react-datepicker__day react-datepicker__day--{secondDate}')]";
    //селектор первого поля ввода даты
    const PERVOE_POLE_DATI=self::CALENDAR_PATH."[1]//div[@class='react-datepicker__input-container']//input";
    //селектор второго поля ввода даты
    const VTOROE_POLE_DATI=self::CALENDAR_PATH."[2]//div[@class='react-datepicker__input-container']//input";
    //селектор первого сброса поля даты
    const KNOPKA_SBROSA_PERV_POLE_DATI=self::CALENDAR_PATH."[1]//div[@class='react-datepicker__input-container']//button[@class='react-datepicker__close-icon']";
    //селектор второго сброса поля даты
    const KNOPKA_SBROSA_VTOR_POLE_DATI=self::CALENDAR_PATH."[2]//div[@class='react-datepicker__input-container']//button[@class='react-datepicker__close-icon']";
    //кнопка выпадающего списка ТСП
    const KNOPKA_SPISKA_TSP=self::TSP_PATH."//div[contains(@class, 'drop')]";
    //селектор выпадающего списка ТСП
    const SPISOK_TSP=self::TSP_PATH."//div[contains(@class, 'MS_drop')]";
    //селектор поля списка ТСП
    const POLE_TSP=self::SPISOK_TSP."//input";
    //кнопка выбора опции Все в поле тсп
    const VIBOR_VSE_TSP=self::SPISOK_TSP."/ul/li[1]/label/span";
    //селектор проверки выбора опции Все в поле тсп
    const PROVERKA_VIBORA_VSE_TSP=self::SPISOK_TSP."/ul/li[1]/label/input";
    //селектор проверки выбора второй опции в поле тсп
    const PROVERKA_VTOR_ELEMTSP=self::SPISOK_TSP."/ul/li[2]/label/input";
    //селектор проверки выбора третьей опции в поле тсп
    const PROVERKA_TRTIY_ELEMTSP=self::SPISOK_TSP."/ul/li[3]/label/input";
    //селектор опций в поле тсп
    const OPCII_TSP=self::SPISOK_TSP."/ul/li/label/input";
    //селектор выбора второго элемента в поле тсп
    const VTOR_ELEMENT_TSP=self::SPISOK_TSP."/ul/li[2]/label/span";
    //селектор выбора третьего элемента в поле тсп
    const TRETIY_ELEMENT_TSP=self::SPISOK_TSP."/ul/li[3]/label/span";
    //селектор ID транзакции в верхнем поле
    const TRANID_VERH="//div[@class='viewOperations']//div[@class='tranID']//input";
    //селектор иконки сортировки
    const SELECTOR_PROVERKI_SORTIROVKI=".sort.desc, .sort.asc";
    //селектор до строки с фильтрами для цикла в 5 пункте
    const CIKL_FILTER="tr.filter td:nth-child({indexTd})";
    //селектор до строки с фильтрами для 5 пункта что бы выбрать элементы
    const CIKL_FILTER_VIBOR="td:nth-child({indexTd}) select option";
    //селектор сортировки таблицы для пункта 13
    const CIKL_SORTIROVK=" th:nth-child({indexTh}) a.sort";
    //кнопка перехода на прошлый месяц в календаря
    const KNOPKA_MESYAZ_NAZAD="//div[@class='viewOperations']//div[@class='datePeriod']//div[@class='react-datepicker__tab-loop']//div[@class='react-datepicker-popper']//div//div[@class='react-datepicker']//button[@class='react-datepicker__navigation react-datepicker__navigation--previous']";
    //текст Все
    const TEXT_ALL="Все";
    //селектор на просмотр операций
    const SELECTOR_CLICK_AFTER_LOGIN="//div[@class='container']//ul[@class='mainmenu']//li//a[@title='viewOperations']";

    public function _before(AcceptanceTester $I)
    {
        if (!$I->loadSessionSnapshot('login')) {
            $this->login($I,"VBEX");
        }
        $this->waitLoading($I);
    }

    public function _after(AcceptanceTester $I)
    {

    }
    /**
     *  wait
     * @param AcceptanceTester $I
     * @return null
     */
    protected function waitLoading(AcceptanceTester $I)
    {
        $I->wait(1);
        while($I->tryToSeeElement('.loader') || $I->tryToSeeElement('.loading')) {
            $I->wait(3);
        }
    }
    /**
     *  login
     * @param AcceptanceTester $I
     * @param string $postfix
     * @return null|AssertFailedError
     */
    protected function login(AcceptanceTester $I,$postfix = "VBEX")
    {


        {

            if ($I->tryToSeeElement('.closeSession')) {
                $I->click(['class'=>'closeSession']);
            }
            $ini_array= parse_ini_file("/app1/tests/_data/config.ini");
            $I->amOnPage('/');
            $login = $ini_array["Login$postfix"];
            $pass = $ini_array["Pass$postfix"];
            $captcha = $ini_array["Captcha"];
            $sms = $ini_array["Sms"];
            $I->waitForText("MerchantPortal");
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
            $I->tryToclick(self::SELECTOR_CLICK_AFTER_LOGIN);
        }
    }
    /**
     *  MPD-46 #0 test Login
     * @param AcceptanceTester $I
     * @return null|AssertFailedError
     */
    public function tryToTestP0(AcceptanceTester $I)
    {
       $I->wantTo("0. Проверка авторизации");
    }
    /**
     *  MPD-46 #1 test click viewOperations
     * @param AcceptanceTester $I
     * @return null|AssertFailedError
     */
    public function tryToTestP1(AcceptanceTester $I)
    {
        $I->wantTo("1. найти ссылку \"Просмотр операций\" и нажать ");
        $I->click(self::SELECTOR_CLICK_AFTER_LOGIN);
        $I->waitForElement( static::TABLE_PATH);//условный маркер прогрузки таблицы
    }
    /**
     *  MPD-46 #2 test selected viewOperations
     * @param AcceptanceTester $I
     * @return null|AssertFailedError
     */
    public function tryToTestP2(AcceptanceTester $I)
    {
        $pageViewOperations="div.page.viewOperations";

        $I->wantTo("2. Проверить что выбран Просмотр операций (есть div с классами page и viewOperations и он видимый)");
        $I->checkVisible($pageViewOperations);
    }
    /**
     *  MPD-46 #3 test no errors in table
     * @param AcceptanceTester $I
     * @return null|AssertFailedError
     */
    public function tryToTestP3(AcceptanceTester $I)
    {
        $error="div.error";

        $I->wantTo("3. Проверить что выбран Просмотр операций Проверить что нет ошибок при отображении таблицы ( нет видимых элементов div с классом error )");
        $I->checkVisible(static::TABLE_PATH);
        $I->DontSeeElement($error);
    }
    /**
     *  MPD-46 #4 test presence of the operations table
     * @param AcceptanceTester $I
     * @return null|AssertFailedError
     */
    public function tryToTestP4(AcceptanceTester $I)
    {
        $I->wantTo("4. Проверить что есть таблица Операций");
        $I->checkVisible(static::TABLE_PATH);

    }
    /**
     *  MPD-46 #5 test table filters
     * @param AcceptanceTester $I
     * @return null|AssertFailedError
     */
    public function tryToTestP5(AcceptanceTester $I)
    {
        $I->wantTo("5. Проверить фильтры списки что в их списках больше одной опции (и что есть опция Все)");
        foreach ([5,6,9,10,13,14,18] as $indexTd) {
            $I->see(static::TEXT_ALL,['css'=>(str_replace("{indexTd}",$indexTd,static::CIKL_FILTER))]);
            $up=$I->grabMultiple(str_replace("{indexTd}",$indexTd,static::CIKL_FILTER_VIBOR));
            $I->comparisonGrabText(2,$up);
        }
    }
    /**
     *  MPD-46 #6 test table data
     * @param AcceptanceTester $I
     * @return null|AssertFailedError
     */
    public function tryToTestP6(AcceptanceTester $I)
    {
        $I->wantTo("6. Проверить что есть данные в таблице");
        $I->checkVisible(static::STROKA_NE_FILTER);
    }
    /**
     *  MPD-46 #7 test selection date from the calendar
     * @param AcceptanceTester $I
     * @return null|AssertFailedError
     */
    public function tryToTestP7(AcceptanceTester $I)
    {
        $textRaisetime=" .raisetime";
        $textEmpty=" .empty";
        $firstNegativeDate="8383873287";
        $secondNegativeDate="2813712";
        $secondDate=mt_rand(20,28);
        $firstDate=mt_rand(1,$secondDate-1);
        $firstDatenNul=$firstDate;
        $secondDatenNul=$secondDate;
        $firstDate=str_pad($firstDate,3,"0",STR_PAD_LEFT);
        $secondDate=str_pad($secondDate,3,"0",STR_PAD_LEFT);

        $I->wantTo("7. Проверить функционал календаря в полях формы \"Период с .. по ..\" (проверки придумать самому которые бы проверяли роботоспособность календаря)");
        $I->click(static::PERVOE_POLE_DATI);
        $I->click(static::KNOPKA_MESYAZ_NAZAD);
        $I->click(str_replace("{firstDate}",$firstDate,static::PERV_VIBOR_CALENDAR));
        $I->click(static::VTOROE_POLE_DATI);
        $I->click(static::KNOPKA_MESYAZ_NAZAD);
        $I->click(str_replace("{secondDate}",$secondDate,static::VTOR_VIBOR_CALENDAR));
        $I->click(static::BUTTON_SHOW);
        $this->waitLoading($I);
        $firstCalendarDate=$I->grabValueFrom(static::PERVOE_POLE_DATI);
        $secondCalendarDate=$I->grabValueFrom(static::VTOROE_POLE_DATI);
        $I->assertEquals(($firstDatenNul),date_format(new DateTime($firstCalendarDate),"d"));
        $I->assertEquals(($secondDatenNul),date_format(new DateTime($secondCalendarDate),"d"));
        $up=$I->grabMultiple(static::TABLE_PATH.$textRaisetime);
        foreach ($up as $indexArray=>$value){
        if(!(($firstDatenNul)<=((date_format(new DateTime($value),"d")))and($secondDatenNul)>=(date_format(new DateTime($value),"d")))){
                PHPUnit\Framework\Assert::fail();
            }
        }
        $I->click(static::KNOPKA_SBROSA_PERV_POLE_DATI);
        $I->click(static::KNOPKA_SBROSA_VTOR_POLE_DATI);
        $I->fillField(static::PERVOE_POLE_DATI,$firstNegativeDate);
        $I->fillField(static::VTOROE_POLE_DATI,$secondNegativeDate);
        $I->click(static::BUTTON_SHOW);
        $this->waitLoading($I);
        $I->checkVisible(static::TABLE_PATH.$textEmpty);
        $I->click(static::KNOPKA_SBROSA_PERV_POLE_DATI);
        $I->click(static::KNOPKA_SBROSA_VTOR_POLE_DATI);
        $I->click(static::BUTTON_SHOW);

    }
/**
     *  MPD-46 #8 test option from the TSP list
     * @param AcceptanceTester $I
     * @return null|AssertFailedError
     */
    public function tryToTestP8(AcceptanceTester $I)
    {
        $I->wantTo("8. Проверить в поле ТСП что в списке больше одной опции (и что есть опция Все)");
        $I->click(static::KNOPKA_SPISKA_TSP);
        $I->see(static::TEXT_ALL,static::SPISOK_TSP);
        $up=$I->grabMultiple(static::POLE_TSP);
        $I->comparisonGrabText(2,$up);
        $I->makeScreenshot();
        $I->click(static::KNOPKA_SPISKA_TSP);
    }
    /**
     *  MPD-46 #9 test option "all" from the TSP list
     * @param AcceptanceTester $I
     * @return null|AssertFailedError
     */
    public function tryToTestP9(AcceptanceTester $I)
    {
        $textDisabled="disabled";

        $I->wantTo("9. Проверить в поле ТСП Что если опция стоит \"Все\", остальные выбрать нельзя-");
        $I->click(static::KNOPKA_SPISKA_TSP);
        $I->click(static::VIBOR_VSE_TSP);
        $I->seeCheckboxIsChecked(static::PROVERKA_VIBORA_VSE_TSP);
        $up=$I->grabMultiple(static::OPCII_TSP,$textDisabled);
        $I->checkEnabledOptionAll($up);//метод вычитает из всех варинтов варианты которые имеют класс disabled и если не равно 1 выкидывает ошибку
        $I->click(static::VIBOR_VSE_TSP);//убирает галку с все для следующего пункта
        $I->click(static::KNOPKA_SPISKA_TSP);
    }
    /**
     *  MPD-46 #10 test multiple sampling from the TSP list
     * @param AcceptanceTester $I
     * @return null|AssertFailedError
     */
    public function tryToTestP10(AcceptanceTester $I)
    {
        $I->wantTo("10. Проверить в поле ТСП Снять галку с \"Все\", остальные выбираются (причем работает множественный выбор)-");
        $I->click(static::KNOPKA_SPISKA_TSP);
        $I->click(static::VTOR_ELEMENT_TSP);
        $I->click(static::TRETIY_ELEMENT_TSP);
        $I->seeCheckboxIsChecked(static::PROVERKA_VTOR_ELEMTSP);
        $I->seeCheckboxIsChecked(static::PROVERKA_TRTIY_ELEMTSP);
        $I->click(static::VTOR_ELEMENT_TSP);
        $I->click(static::TRETIY_ELEMENT_TSP);
        $I->click(static::KNOPKA_SPISKA_TSP);
    }
    /**
     *  MPD-46 #11 test filter tranId
     * @param AcceptanceTester $I
     * @return null|AssertFailedError
     */
    public function tryToTestP11(AcceptanceTester $I)
    {
        $I->wantTo("11. взять из колонки любой tranId, вставить в фильтр по этому полю, нажать найти. Ожидать появления одной строки в таблице но не более 3 сек. Убедиться что также значение прописалось в верхнем поле, а даты очистились");
        $up=$I->grabMultiple(static::STOLB_TRANID_TABLICI);
        $I->fillField(static::TRANID_TABLICI, "$up[3]");
        $I->click(static::BUTTON_SHOW);
        $I->waitForElement(static::MP_EXPORT, 3);
        $this->waitLoading($I);
        $textFilter=$I->grabValueFrom(static::TRANID_TABLICI);
        $textTranId=$I->grabValueFrom(static::TRANID_VERH);
        $I->assertEquals($textFilter,$textTranId);
        $I->DontSeeElement(static::TRETYA_STROKA_TABLICI);
    }
    /**
     *  MPD-46 #12 test click on tranId and see information
     * @param AcceptanceTester $I
     * @return null|AssertFailedError
     */
    public function tryToTestP12(AcceptanceTester $I)
    {
        $textIdentif="Идентификатор транзакции";

        $I->wantTo("12. Нажать на ссылку со значением tranId убедиться что в открывшемся окне данные погрузились в течение не более 3сек");
        $I->click(static::STOLB_TRANID_TABLICI);//
        $I->waitForText($textIdentif,3);
        $I->checkVisible(static::DANNIE_TRANID);
        $I->click(static::KNOPKA_ZAKRITIE_TRANID);
        $I->fillField(static::TRANID_TABLICI, "");
        $I->fillField(static::TRANID_VERH, "");
        $I->click(static::BUTTON_SHOW);
    }
    /**
     *  MPD-46 #13 field sorting test
     * @param AcceptanceTester $I
     * @return null|AssertFailedError
     */
    public function tryToTestP13(AcceptanceTester $I)
    {
        $I->wantTo( "13. Проверить сортировки полей (нажал и в течение 30 сек данные отобразились и поменялась иконка сортировки в шапке колонки)");
        foreach ([2,3,4,5,6,7,8,9,10,11,12,13,14,15,17,18] as $indexTh){
            $I->click(static::TABLE_PATH.str_replace("{indexTh}",$indexTh,static::CIKL_SORTIROVK));
            $I->waitForElement(static::MP_EXPORT,30);
            if (!($I->tryToSeeElement(".sort.desc"))and(!($I->tryToSeeElement(".sort.asc")))){
                PHPUnit\Framework\Assert::fail();
            }
        }
    }
    /**
     *  MPD-46 #14 test login VTB and table column
     * @param AcceptanceTester $I
     * @return null|AssertFailedError
     */
    public function tryToTestP14(AcceptanceTester $I)
    {
        $indexTd=19;
        $textSelectorTS=" .transaction_status";

        $I->wantTo("14. Перелогинится пользователем VTB Проверить что есть колонка осуществлённые действия, и в ней есть фильтр в списках которого больше одной опции (и есть опция Все)");
        $this->login($I,"VTB");
        $this->waitLoading($I);
        $I->seeElement(static::TABLE_PATH.$textSelectorTS);
        $I->see(static::TEXT_ALL,['css'=>(str_replace("{indexTd}",$indexTd,static::CIKL_FILTER))]);
        $up=$I->grabMultiple(str_replace("{indexTd}",$indexTd,static::CIKL_FILTER_VIBOR));
        $I->comparisonGrabText(2,$up);
    }
