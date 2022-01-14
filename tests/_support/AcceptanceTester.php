<?php
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\Remote\RemoteWebElement;



/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;


    use _generated\AcceptanceTesterActions;

    public function haveVisible($element)
    {
        $I = $this;
        $value = false;
        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webDriver) use ($element, &$value) {

            $element = $webDriver->findElement(WebDriverBy::cssSelector($element));
            codecept_debug(get_class($element));
            $value = $element instanceof RemoteWebElement;

        });
        return $value;

    }

    public function checkVisible($element)
    {

        $I = $this;

        ($vp = $I->haveVisible($element));
        if (!$vp = 1) {

            codecept_debug("$vp sssss");
            codecept_debug($this->haveVisible($element));
            codecept_debug($element);


            PHPUnit\Framework\Assert::fail();
        }
    }

    public function loginPortal()
    {
        $I = $this;
        $I->wantTo('check');
        $ini_array = parse_ini_file("Dat.ini");
        $I->amOnPage('/');
        $login = $ini_array["Login"];
        $pass = $ini_array["Pass"];
        $captcha = $ini_array["Captcha"];
        $sms = $ini_array["Sms"];
        $I->fillField('Логин *', $login);
        $I->fillField('Пароль *', $pass);
        $I->fillField('Код проверки *', $captcha);
        $I->click('Войти');
        $I->waitForText("Смс код", 10);
        $I->fillField('Смс код *', $sms);
        $I->click('Войти');
        $I->waitForText("Личный кабинет", 10);
    }
}


