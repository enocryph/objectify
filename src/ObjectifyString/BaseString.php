<?php


namespace Objectify\ObjectifyString;

use Objectify\Interfaces\ObjectifyInterface;

/**
 * Class BaseString
 * @package Objectify\ObjectifyString
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
class BaseString implements ObjectifyInterface, \Countable, \ArrayAccess
{
    /**
     * @var string
     */
    protected $value;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->setValue($value);
    }

    /**
     * @param $value
     * @return $this
     */
    public function __invoke($value)
    {
        if ($value) {
            $this->setValue($value);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->value;
    }

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    public function count()
    {
        // TODO: Implement count() method.
    }
}