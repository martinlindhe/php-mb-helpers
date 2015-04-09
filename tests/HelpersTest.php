<?php

class HelpersTest extends PHPUnit_Framework_TestCase
{
    function test_mb_ucwords()
    {
        $this->assertEquals('Åäö', mb_ucwords('åäö'));
        $this->assertEquals('Åäö Öäå', mb_ucwords('åäö öäå'));
    }

    function test_mb_ucfirst()
    {
        $this->assertEquals('Åäö', mb_ucfirst('åäö'));
        $this->assertEquals('Åäö öäå', mb_ucfirst('åäö öäå'));
    }

    function test_mb_strrev()
    {
        $this->assertEquals('öäå', mb_strrev('åäö'));
        $this->assertEquals('öäÅ', mb_strrev('Åäö'));
    }
}
