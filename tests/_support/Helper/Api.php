<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Api extends \Codeception\Module

{public function equalValue($expected, $actual, $message = '', $delta = 0.0)
{

    $this->assertEquals($expected, $actual, $message, $delta);}
}
