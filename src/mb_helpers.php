<?php

if (!function_exists('mb_ucwords')) {
    /**
     * @param string $str
     * @param string $encoding
     * @return string Uc Words
     */
    function mb_ucwords($str, $encoding = 'UTF-8')
    {
        return mb_convert_case($str, MB_CASE_TITLE, $encoding);
    }
}

if (!function_exists('mb_ucfirst')) {
    /**
     * @param string $str
     * @param string $encoding
     * @return string Uc first
     */
    function mb_ucfirst($str, $encoding = 'UTF-8')
    {
        $firstLetter = mb_substr($str, 0, 1, $encoding);
        $rest = mb_substr($str, 1, mb_strlen($str, $encoding), $encoding);

        return mb_strtoupper($firstLetter, $encoding) . $rest;
    }
}

if (!function_exists('mb_strrev')) {
    /**
     * @param string $str
     * @param string $encoding
     * @return string
     */
    function mb_strrev($str, $encoding = 'UTF-8')
    {
        $str = mb_convert_encoding($str, 'UTF-16BE', $encoding);

        return mb_convert_encoding(strrev($str), $encoding, 'UTF-16LE');
    }
}

if (!function_exists('mb_str_pad')) {
    /**
     * @param string $input
     * @param int $pad_length
     * @param string $pad_string
     * @param int $pad_type
     * @param string $encoding
     * @return string
     */
    function mb_str_pad($input, $pad_length, $pad_string = ' ', $pad_type = STR_PAD_RIGHT, $encoding = 'UTF-8')
    {
        $diff = strlen($input) - mb_strlen($input, $encoding);

        return str_pad($input, $pad_length + $diff, $pad_string, $pad_type);
    }
}

if (!function_exists('mb_count_chars')) {
    /**
     * @param string $string
     * @param int $mode only mode 1 and 3 is available
     * @param string $encoding
     * @return array|string
     * @throws \Exception
     */
    function mb_count_chars($string, $mode, $encoding = 'UTF-8')
    {
        $l = mb_strlen($string, $encoding);
        $unique = array();
        for ($i = 0; $i < $l; $i++) {
            $char = mb_substr($string, $i, 1, $encoding);
            if (!array_key_exists($char, $unique)) {
                $unique[$char] = 0;
            }
            $unique[$char]++;
        }

        if ($mode == 1) {
            return $unique;
        }

        if ($mode == 3) {
            $res = '';
            foreach ($unique as $index => $count) {
                $res .= $index;
            }
            return $res;
        }

        throw new \Exception('unsupported mode ' . $mode);
    }
}
