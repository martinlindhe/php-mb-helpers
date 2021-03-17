<?php

class HelpersTest extends PHPUnit_Framework_TestCase
{
    function test_mb_ucwords()
    {
        $this->assertEquals('Åäö', mb_ucwords('åäö'));
        $this->assertEquals('Åäö Öäå', mb_ucwords('åäö öäå'));

        $this->assertEquals(ucwords('H.G. Wells'), mb_ucwords('H.G. Wells'));
        $this->assertEquals(ucwords('h.g. wells'), mb_ucwords('h.g. wells'));
        $this->assertEquals(ucwords('H.G. WELLS'), mb_ucwords('H.G. WELLS'));
    }

    function test_mb_ucfirst()
    {
        $this->assertEquals('Åäö', mb_ucfirst('åäö'));
        $this->assertEquals('Åäö öäå', mb_ucfirst('åäö öäå'));

        $this->assertEquals(ucfirst('H.G. Wells'), mb_ucfirst('H.G. Wells'));
        $this->assertEquals(ucfirst('h.g. wells'), mb_ucfirst('h.g. wells'));
        $this->assertEquals(ucfirst('H.G. WELLS'), mb_ucfirst('H.G. WELLS'));
    }

    function test_mb_strrev()
    {
        $this->assertEquals('öäå', mb_strrev('åäö'));
        $this->assertEquals('öäÅ', mb_strrev('Åäö'));

        $this->assertEquals(strrev('bobby'), mb_strrev('bobby'));
    }

    function test_mb_str_pad()
    {
        $this->assertEquals('a   ', mb_str_pad('a', 4));
        $this->assertEquals('ö   ', mb_str_pad('ö', 4));

        $this->assertEquals(str_pad('a', 4), mb_str_pad('a', 4));
    }

    function test_mb_count_chars()
    {
        $this->assertEquals(array('ö' => 1, 'b' => 2), mb_count_chars('böb', 1));
        $this->assertEquals('bö', mb_count_chars('böb', 3));
        $this->assertEquals(count_chars('bobby', 3), count_chars('bobby', 3));
    }

    /**
     * @expectedException Exception
     */
    function test_mb_count_chars_unsupported_mode()
    {
        mb_count_chars('böb', 2);
    }

    function test_mb_str_split()
    {
        $this->assertEquals(array('b', 'ö', 'b'), mb_str_split('böb'));

        $this->assertEquals(array('bö', 'b'), mb_str_split('böb', 2));

        for ($i = 1; $i < 10; $i++) {
            $this->assertEquals(str_split('bob', $i), mb_str_split('bob', $i));
        }

        $this->assertEquals(str_split('bobby'), mb_str_split('bobby'));
        $this->assertEquals(str_split(''), mb_str_split(''));

        foreach(array(0,-1) as $length) {
          $exception_thrown = false;
          try {
             mb_str_split('foo', $length);
          } catch (Exception $e) {
             $exception_thrown = true;
             $this->assertEquals('The length of each segment must be greater than zero', $e->getMessage());
          }
          $this->assertTrue($exception_thrown);
        }
    }

}
