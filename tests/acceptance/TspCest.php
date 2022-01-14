<?php

class tspCest
{
    public function _before(AcceptanceTester $I)
    {

    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo("check p.8");
        $I->loginPortal();
        $I->click(['css'=>'.item:nth-child(2) .drop:nth-child(3)']);
        $I->wait(3);
        $I->see("Все",['css'=>'.item:nth-child(2) .MS_drop:last-child']);
        $I->see("22000001 - 22000001 (Москва)",['css'=>'.item:nth-child(2) .MS_drop:last-child']);
        $I->wantTo("check p.10");
        $I->click(['css'=>'.item:nth-child(2) li:first-child span']);
        $I->wait(1);
        $I->click(['css'=>'.item:nth-child(2) li:first-child span']);
        $I->wait(1);
        $I->click(['css'=>'.item:nth-child(2) li:nth-child(2) span']);

        $I->wait(3);

        //$I->SeeCheckboxIsChecked(['css'=>'.item:nth-child(2) li:nth-child(2) span']);


    }
}
