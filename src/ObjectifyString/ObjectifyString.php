<?php


namespace Objectify\ObjectifyString;

use Objectify\Interfaces\ObjectifyInterface;

/**
 * Class ObjectifyString
 * @package Objectify\ObjectifyString
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
class ObjectifyString extends BaseString implements ObjectifyInterface
{
    /**
     * Make a string uppercase
     *
     * @see strtoupper()
     * @param mixed ...$sequence
     * @return ObjectifyString
     */
    public function uppercase(...$sequence)
    {
        return $this->processCall($sequence, 'strtoupper');
    }

    /**
     * Make a string's first character uppercase
     *
     * @see ucfirst()
     * @param mixed ...$sequence
     * @return $this
     */
    public function uppercaseFirst(...$sequence)
    {
        return $this->processCall($sequence, 'ucfirst');
    }

    /**
     * Uppercase the first character of each word in a string
     *
     * @see ucwords()
     * @param mixed $delimiters
     * @param mixed ...$sequence
     * @return $this
     */
    public function uppercaseWords($delimiters = " \t\r\n\f\v", ...$sequence)
    {
        return $this->processCall($sequence, 'ucwords', [$delimiters]);
    }

    /**
     * Make a string lowercase
     *
     * @see strtolower()
     * @param mixed ...$sequence
     * @return ObjectifyString
     */
    public function lowercase(...$sequence)
    {
        return $this->processCall($sequence, 'strtolower');
    }

    /**
     * Make a string's first character lowercase
     *
     * @see lcfirst()
     * @param mixed ...$sequence
     * @return $this
     */
    public function lowercaseFirst(...$sequence)
    {
        return $this->processCall($sequence, 'lcfirst');
    }

    /**
     * Trim string or string part with sequence
     *
     * @see trim()
     * @param mixed ...$sequence
     * @return ObjectifyString
     */
    public function trim(...$sequence)
    {
        return $this->processCall($sequence, 'trim');
    }

    /**
     * Left trim string or string part with sequence
     *
     * @see ltrim()
     * @param mixed ...$sequence
     * @return ObjectifyString
     */
    public function ltrim(...$sequence)
    {
        return $this->processCall($sequence, 'ltrim');
    }

    /**
     * Right trim string or string part with sequence
     *
     * @see rtrim()
     * @param mixed ...$sequence
     * @return ObjectifyString
     */
    public function rtrim(...$sequence)
    {
        return $this->processCall($sequence, 'rtrim');
    }

    /**
     * Alias trim()
     * Trim string or string part with sequence
     *
     * @see trim()
     * @param mixed ...$sequence
     * @return ObjectifyString
     */
    public function strip(...$sequence)
    {
        return $this->processAliasCall('trim', $sequence);
    }

    /**
     * Alias ltrim()
     * Left trim string or string part with sequence
     *
     * @see ltrim()
     * @param mixed ...$sequence
     * @return ObjectifyString
     */
    public function stripLeft(...$sequence)
    {
        return $this->processAliasCall('ltrim', $sequence);
    }

    /**
     * Alias rtrim()
     * Right trim string or string part with sequence
     *
     * @see rtrim()
     * @param mixed ...$sequence
     * @return ObjectifyString
     */
    public function stripRight(...$sequence)
    {
        return $this->processAliasCall('rtrim', $sequence);
    }

    /**
     * Reverse string
     *
     * @see strrev()
     * @param mixed ...$sequence
     * @return ObjectifyString
     */
    public function reverse(...$sequence)
    {
        return $this->processCall($sequence, 'strrev');
    }

    /**
     * Shuffle string
     *
     * @see str_shuffle()
     * @param mixed ...$sequence
     * @return ObjectifyString
     * @codeCoverageIgnore
     */
    public function shuffle(...$sequence)
    {
        return $this->processCall($sequence, 'str_shuffle');
    }

    /**
     * Return string length
     *
     * @see strlen()
     * @return integer
     */
    public function length()
    {
        return $this->processNonSequenceCall('strlen', [], true);
    }

    /**
     * Return part of a string
     *
     * @see substr()
     * @param mixed ...$sequence
     * @return mixed|BaseString
     */
    public function slice(...$sequence)
    {
        return $this->processCall($sequence, self::FUNCTIONS_NAMESPACE . 'getEmptyString', [], self::OTHER);
    }

    /**
     * Check string starts with
     *
     * @param $string
     * @param bool $caseSensitive
     * @param mixed ...$sequence
     * @return boolean
     */
    public function startsWith($string, $caseSensitive = true, ...$sequence)
    {
        $function = $caseSensitive ? 'startsWith' : 'startsWithCaseInsensitive';
        return $this->processCall($sequence, self::FUNCTIONS_NAMESPACE . $function, [$string], self::SEPARATED, true);
    }

    /**
     * Check string ends with
     *
     * @param $string
     * @param bool $caseSensitive
     * @param mixed ...$sequence
     * @return boolean
     */
    public function endsWith($string, $caseSensitive = true, ...$sequence)
    {
        $function = $caseSensitive ? 'endsWith' : 'endsWithCaseInsensitive';
        return $this->processCall($sequence, self::FUNCTIONS_NAMESPACE . $function, [$string], self::SEPARATED, true);
    }

    /**
     * Insert string to the end
     *
     * @param $string
     * @param mixed ...$sequence
     * @return $this
     */
    public function append($string, ...$sequence)
    {
        return $this->processCall($sequence, self::FUNCTIONS_NAMESPACE . 'append', [$string]);
    }

    /**
     * Insert string to the beginning
     *
     * @param $string
     * @param mixed ...$sequence
     * @return $this
     */
    public function prepend($string, ...$sequence)
    {
        return $this->processCall($sequence, self::FUNCTIONS_NAMESPACE . 'prepend', [$string]);
    }

    /**
     * Insert string to the both sides
     *
     * @param $string
     * @param mixed ...$sequence
     * @return $this
     */
    public function appendBoth($string, ...$sequence)
    {
        return $this->processCall($sequence, self::FUNCTIONS_NAMESPACE . 'appendBoth', [$string]);
    }

    /**
     * Pad a string to a certain length with another string
     *
     * @see str_pad()
     * @param $length
     * @param string $pad
     * @param int $type can be STR_PAD_RIGHT | STR_PAD_LEFT | STR_PAD_BOTH
     * @param mixed $sequence
     * @return $this
     */
    public function pad($length, $pad = " ", $type = STR_PAD_RIGHT, ...$sequence)
    {
        return $this->processCall($sequence, 'str_pad', [$length, $pad, $type]);
    }

    /**
     * @param $multiplier
     * @param mixed ...$sequence
     * @return $this
     */
    public function repeat($multiplier, ...$sequence)
    {
        return $this->processCall($sequence, 'str_repeat', [$multiplier]);
    }

    /**
     * Replace all occurrences of the search string with the replacement string
     *
     * @see str_replace()
     * @see str_ireplace()
     * @param $search
     * @param $replace
     * @param $caseSensitive
     * @param mixed ...$sequence
     * @return $this
     */
    public function replace($search, $replace, $caseSensitive = true, ...$sequence)
    {
        return $this->processCall($sequence, $caseSensitive ? 'str_replace' : 'str_ireplace', [$search, $replace, 'value' => true]);
    }

    /**
     * Replace text within a portion of a string
     *
     * @see substr_replace()
     * @param $replacement
     * @param mixed ...$sequence
     * @return $this
     */
    public function replaceWith($replacement, ...$sequence)
    {
        return $this->processCall($sequence, self::FUNCTIONS_NAMESPACE . 'fakeReplace', [$replacement]);
    }

    /**
     * Convert a string to an array
     *
     * @see str_split()
     * @param int $length
     * @param mixed ...$sequence
     * @return array
     */
    public function split($length = 1, ...$sequence)
    {
        return $this->processCall($sequence, 'str_split', [$length], self::SEPARATED, true);
    }

    /**
     * Binary safe string comparison
     *
     * @see strcmp()
     * @see strcasecmp()
     * @param $string
     * @param bool $caseSensitive
     * @param mixed ...$sequence
     * @return int
     */
    public function compareWith($string, $caseSensitive = true, ...$sequence)
    {
        return $this->processCall($sequence, $caseSensitive ? 'strcmp' : 'strcasecmp', [$string], self::SEPARATED, true);
    }

    /**
     * Find the position of the occurrence of a substring in a string
     *
     * @param $needle
     * @param int $offset
     * @param bool $caseSensitive
     * @param bool $fromEnd
     * @param mixed ...$sequence
     * @return int|bool
     */
    public function position($needle, $offset = 0, $caseSensitive = true, $fromEnd = false, ...$sequence)
    {
        $function = $fromEnd ? $caseSensitive ? 'strrpos' : 'strripos' : $caseSensitive ? 'strpos' : 'stripos';
        return $this->processCall($sequence, $function, [$needle, $offset], self::SEPARATED, true);
    }

    /**
     * Wraps a string to a given number of characters
     *
     * @param $width
     * @param $break
     * @param $cut
     * @param mixed ...$sequence
     * @return $this
     */
    public function wordwrap($width = 75, $break = "\n", $cut = false, ...$sequence)
    {
        return $this->processCall($sequence, 'wordwrap', [$width, $break, $cut], self::SEPARATED);
    }
}
