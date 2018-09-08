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
     * @return mixed|BaseString
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
     * @return mixed|BaseString
     */
    public function endsWith($string, $caseInsensitive = false, ...$sequence)
    {
        $function = $caseInsensitive ? 'endsWithCaseInsensitive' : 'endsWith';
        return $this->processCall($sequence, self::FUNCTIONS_NAMESPACE . $function, [$string], self::SEPARATED, true);
    }
}