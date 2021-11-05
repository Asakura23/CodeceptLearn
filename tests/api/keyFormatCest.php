<?php

class keyFormatCest
{
    public function TestingApiCest(ApiTester $I)
    {
        $I->wantTo('check name format');
        $I->amOnPage('/daily_json.js');
        $I->sendGet('/daily_json.js');
        $I->seeResponseCodeIs(200);
        $Keys = $I->grabDataFromResponseByJsonPath('$Valute..');
        $I->assertIsArray($Keys);
        array_keys($Keys);
        codecept_debug($Keys);






    }

}