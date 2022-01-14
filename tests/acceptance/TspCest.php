<?php

class tspCest
{
    public function _before(AcceptanceTester $I)
    {

    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo("Проверить в поле ТСП что в списке больше одной опции (и что есть опция Все)");
        $I->loginPortal();
        $I->click(['css'=>'.item:nth-child(2) .drop:nth-child(3)']);
        $I->wait(3);
        $I->see("Все",['css'=>'.item:nth-child(2) .MS_drop:last-child']);
        $I->see("22000001 - 22000001 (Москва)",['css'=>'.item:nth-child(2) .MS_drop:last-child']);
        $I->wantTo("Проверить в поле ТСП Снять галку с \"Все\", остальные выбираются (причем работает множественный выбор)");
        $I->click(['css'=>'.item:nth-child(2) li:first-child span']);
        $I->wait(1);
        $I->click(['css'=>'.item:nth-child(2) li:first-child span']);
        $I->wait(1);
        $I->click(['css'=>'.item:nth-child(2) li:nth-child(2) span']);

        $I->wait(3);

        //$I->SeeCheckboxIsChecked(['css'=>'.item:nth-child(2) li:nth-child(2) span']);


    }
}
