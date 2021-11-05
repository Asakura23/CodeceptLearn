<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Check that MainPage and About are work');
$I->amOnPage('/');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->see('Компания');
$I->amOnPage('/company');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->see('История');

