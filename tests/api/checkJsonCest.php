<?php
class ApiCest
{
    public function TestingApiCest(ApiTester $I)
    {
        $I->wantTo('check structure json');
        $I->sendGet('/daily_json.js');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType([
            'ID' => 'string',
            'NumCode' => 'string',
            'CharCode' => 'string',
            'Nominal' => 'integer',
            'Name' => 'string',
            'Value' => 'float',
            'Previous'=>'float'
        ], '$.Valute[*]');
    }
}