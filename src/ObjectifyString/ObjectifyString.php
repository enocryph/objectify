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
        return $this->processNormalCallWithResult('strlen');
    }

    public function slice(...$sequence)
    {
        return $this->processCall($sequence, '\Objectify\ObjectifyString\getEmptyString', self::OTHER);
    }
}