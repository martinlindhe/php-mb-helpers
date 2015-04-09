<?php

/**
 * @param string $s
 * @param string $encoding
 * @return string Uc Words
 */
function mb_ucwords($s, $encoding = 'UTF-8')
{
    return mb_convert_case($s, MB_CASE_TITLE, $encoding);
}

/**
 * @param string $s
 * @param string $encoding
 * @return string Uc first
 */
function mb_ucfirst($s, $encoding = 'UTF-8')
{
    $firstLetter = mb_substr($s, 0, 1, $encoding);
    $rest = mb_substr($s, 1, mb_strlen($s));

    return mb_strtoupper($firstLetter, $encoding) . $rest;
}

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
