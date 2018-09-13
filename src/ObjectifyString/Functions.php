<?php

namespace Objectify\ObjectifyString;

/**
 * @return string
 */
function getEmptyString()
{
    return '';
}

function fakeReplace($string, $replacement)
{
    return $replacement;
}

/**
 * @param $haystack
 * @param $needle
 * @return bool
 */
function startsWith($haystack, $needle)
{
    return substr($haystack, 0, strlen($needle)) === $needle;
}

/**
 * @param $haystack
 * @param $needle
 * @return bool
 */
function startsWithCaseInsensitive($haystack, $needle)
{
    $haystack = strtolower($haystack);
    $needle = strtolower($needle);
    return substr($haystack, 0, strlen($needle)) === $needle;
}

/**
 * @param $haystack
 * @param $needle
 * @return bool
 */
function endsWith($haystack, $needle)
{
    return substr($haystack, -strlen($needle)) === $needle;
}

/**
 * @param $haystack
 * @param $needle
 * @return bool
 */
function endsWithCaseInsensitive($haystack, $needle)
{
    $haystack = strtolower($haystack);
    $needle = strtolower($needle);
    return substr($haystack, -strlen($needle)) === $needle;
}

/**
 * @param $string
 * @param $attachable
 * @return string
 */
function append($string, $attachable)
{
    return $string . $attachable;
}

/**
 * @param $string
 * @param $attachable
 * @return string
 */
function prepend($string, $attachable)
{
    return $attachable . $string;
}

/**
 * @param $string
 * @param $attachable
 * @return string
 */
function appendBoth($string, $attachable)
{
    return $attachable . $string . $attachable;
}