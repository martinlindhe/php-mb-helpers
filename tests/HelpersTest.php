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

    function test_mb_str_pad()
    {
        $this->assertEquals('a   ', mb_str_pad('a', 4));
        $this->assertEquals('ö   ', mb_str_pad('ö', 4));
    }

    function test_mb_count_chars()
    {
        $this->assertEquals(['ö' => 1, 'b' => 2], mb_count_chars('böb', 1));
        $this->assertEquals('bö', mb_count_chars('böb', 3));
    }
}
