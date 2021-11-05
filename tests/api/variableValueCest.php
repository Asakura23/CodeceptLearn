<?php
class VariableValueCest
{
    public function TestingApiCest(ApiTester $I)
    {
        $I->wantTo('check variable format');
        $I->amOnPage('/daily_json.js');
        $I->sendGet('/daily_json.js');
        $I->seeResponseCodeIs(200);
        $Value = $I-> grabDataFromResponseByJsonPath('$.Valute..Value');
        codecept_debug("ssssd");
        $I->assertIsArray($Value);
        codecept_debug($Value);
        $regexp = "~[0-9]+\.[0-9]+~";
        foreach ($Value as $cntValue) {
            $I->assertRegExp($regexp,$cntValue);
        }




    }


}

