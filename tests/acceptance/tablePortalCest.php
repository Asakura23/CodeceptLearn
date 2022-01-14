<?php

class tablePortalCest
{
    public function _before(AcceptanceTester $I)
    {

    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->loginPortal();
        $I->click('viewOperations');
        $I->waitForText("Экспорт",10);
        $I->checkVisible(".gridItems.viewOperations");
        $I->waitForElement(".even");
        $I->seeElement(".even") or $I->seeElement(".odd");
        $I->checkVisible(".filter");
        $I->see("10",['css'=>'table td:nth-child(5)']) and $I->see("Все",['css'=>'table td:nth-child(5)']);
        $I->see("Все",['css'=>'table td:nth-child(6)']) and $I->see("[100] Авторизационное сообщение",['css'=>'table td:nth-child(6)']);
        $I->see("Все",['css'=>'table td:nth-child(9)']) and $I->see("[840] US dollar (USD)",['css'=>'table td:nth-child(9)']);
        $I->see("Все",['css'=>'table td:nth-child(10)']) and $I->see("5",['css'=>'table td:nth-child(10)']);
        $I->see("Все",['css'=>'table td:nth-child(13)']) and $I->see("Да",['css'=>'table td:nth-child(13)']);
        $I->see("Все",['css'=>'table td:nth-child(14)']) and $I->see("Visa",['css'=>'table td:nth-child(14)']);
        $I->see("Все",['css'=>'table td:nth-child(18)']) and $I->see("Успешные",['css'=>'table td:nth-child(18)']);





    }
}
