<?php

class HelpersTest extends PHPUnit_Framework_TestCase
{
    function test_mb_ucwords()
    {
        $this->assertEquals('Åäö', mb_ucwords('åäö'));
        $this->assertEquals('Åäö Öäå', mb_ucwords('åäö öäå'));


        $this->assertEquals('H.G. Wells', ucwords('H.G. Wells'));
        $this->assertEquals('H.g. Wells', ucwords('h.g. wells'));

//        $this->assertEquals('H.G. Wells', mb_ucwords('H.G. Wells'));
//        $this->assertEquals('H.g. Wells', mb_ucwords('h.g. wells'));
    }

    function test_mb_ucfirst()
    {
        $this->assertEquals('Åäö', mb_ucfirst('åäö'));
        $this->assertEquals('Åäö öäå', mb_ucfirst('åäö öäå'));

        $this->assertEquals('H.G. Wells', ucfirst('H.G. Wells'));
        $this->assertEquals('H.g. wells', ucfirst('h.g. wells'));

        $this->assertEquals('H.G. Wells', mb_ucfirst('H.G. Wells'));
        $this->assertEquals('H.g. wells', mb_ucfirst('h.g. wells'));
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
        $this->assertEquals(array('ö' => 1, 'b' => 2), mb_count_chars('böb', 1));
        $this->assertEquals('bö', mb_count_chars('böb', 3));
    }

    /**
     * @@expectedException Exception
     */
    function test_mb_count_chars_unsupported_mode()
    {
        mb_count_chars('böb', 2);
    }
}
