<?php

class nameFormatCest
{
    public function TestingApiCest(ApiTester $I)
    {
        $I->wantTo('check name format');
        $I->amOnPage('/daily_json.js');
        $I->sendGet('/daily_json.js');
        $I->seeResponseCodeIs(200);
        $Keys = $I->grabDataFromResponseByJsonPath('$Valute..CharCode');
        $I->assertIsArray($Keys);
        codecept_debug($Keys);
        $regexp = "/[A-Z][A-Z][A-Z]/";
        foreach ($Keys as $cntKeys) {
            $I->assertRegExp($regexp,$cntKeys);
        }




    }

}
