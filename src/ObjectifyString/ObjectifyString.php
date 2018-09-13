<?php


namespace Objectify\ObjectifyString;

use Objectify\Interfaces\ObjectifyInterface;
use phpDocumentor\Reflection\Types\This;

/**
 * Class ObjectifyString
 * @package Objectify\ObjectifyString
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
class ObjectifyString extends BaseString implements ObjectifyInterface
{
    /**
     * @var string
     */
    const FUNCTIONS_NAMESPACE = "\Objectify\ObjectifyString\\";

    /**
     * Make a string or string part with sequence uppercase
     *
     * @param mixed ...$sequence
     * @return ObjectifyString
     */
    public function uppercase(...$sequence)
    {
        return $this->processCall($sequence, 'strtoupper');
    }

    /**
     * Make a string or string part with sequence lowercase
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
     * Reverse string or string part with sequence
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
     * Shuffle string or string part with sequence
     *
     * @see strrev()
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
     * @param mixed ...$sequence
     * @return mixed|BaseString
     */
    public function slice(...$sequence)
    {
        return $this->processCall($sequence, self::FUNCTIONS_NAMESPACE . 'getEmptyString', [], self::OTHER);
    }

    /**
     * @param $string
     * @param bool $caseInsensitive
     * @param mixed ...$sequence
     * @return boolean
     */
    public function startsWith($string, $caseInsensitive = false, ...$sequence)
    {
        $function = $caseInsensitive ? 'startsWithCaseInsensitive' : 'startsWith';
        return $this->processCall($sequence, self::FUNCTIONS_NAMESPACE . $function, [$string], self::SEPARATED, true);
    }

    /**
     * @param $string
     * @param bool $caseInsensitive
     * @param mixed ...$sequence
     * @return boolean
     */
    public function endsWith($string, $caseInsensitive = false, ...$sequence)
    {
        $function = $caseInsensitive ? 'endsWithCaseInsensitive' : 'endsWith';
        return $this->processCall($sequence, self::FUNCTIONS_NAMESPACE . $function, [$string], self::SEPARATED, true);
    }

    /**
     * @param $string
     * @param mixed ...$sequence
     * @return $this
     */
    public function append($string, ...$sequence)
    {
        return $this->processCall($sequence, self::FUNCTIONS_NAMESPACE . 'append', [$string]);
    }

    /**
     * @param $string
     * @param mixed ...$sequence
     * @return $this
     */
    public function prepend($string, ...$sequence)
    {
        return $this->processCall($sequence, self::FUNCTIONS_NAMESPACE . 'prepend', [$string]);
    }

    /**
     * @param $string
     * @param mixed ...$sequence
     * @return $this
     */
    public function appendBoth($string, ...$sequence)
    {
        return $this->processCall($sequence, self::FUNCTIONS_NAMESPACE . 'appendBoth', [$string]);
    }

    /**
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
     * @param $search
     * @param $replace
     * @param mixed ...$sequence
     * @return $this
     */
    public function replace($search, $replace, ...$sequence)
    {
        return $this->processCall($sequence, 'str_replace', [$search, $replace, 'value' => true]);
    }

    /**
     * @param $replacement
     * @param mixed ...$sequence
     * @return $this
     */
    public function replaceWith($replacement, ...$sequence)
    {
        return $this->processCall($sequence, self::FUNCTIONS_NAMESPACE . 'fakeReplace', [$replacement]);
    }
}