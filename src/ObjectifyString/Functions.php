<?php

namespace Objectify\ObjectifyString;

function getEmptyString()
{
    return '';
}

function startsWith($haystack, $needle)
{
    return substr($haystack, 0, strlen($needle)) === $needle;
}

function startsWithCaseInsensitive($haystack, $needle)
{
    $haystack = strtolower($haystack);
    $needle = strtolower($needle);
    return substr($haystack, 0, strlen($needle)) === $needle;
}

function endsWith($haystack, $needle)
{
    return substr($haystack, -strlen($needle)) === $needle;
}

function endsWithCaseInsensitive($haystack, $needle)
{
    $haystack = strtolower($haystack);
    $needle = strtolower($needle);
    return substr($haystack, -strlen($needle)) === $needle;
}