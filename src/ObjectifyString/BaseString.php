<?php


namespace Objectify\ObjectifyString;

use Objectify\Bench\StringGlue;
use Objectify\Bench\StringScissors;
use Objectify\Bench\Workbench;
use Objectify\Interfaces\ObjectifyInterface;
use Objectify\Sequence\StringSequenceCreator;

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
     * BaseString constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
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
        $this->value = $value;
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
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->value[$offset]);
    }

    /**
     * @param mixed $offset
     * @return string
     */
    public function offsetGet($offset)
    {
        return $this->value[$offset];
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @return $this
     */
    public function offsetSet($offset, $value)
    {
        $this->value[$offset] = $value;
        return $this;
    }

    /**
     * @param mixed $offset
     * @return $this
     */
    public function offsetUnset($offset)
    {
        return $this->processCall($offset, '\Objectify\ObjectifyString\getEmptyString');
    }

    /**
     * @return int
     */
    public function count()
    {
        return strlen($this->value);
    }

    /**
     * @param $sequence
     * @param callable $callback
     * @param array $parameters
     * @param string $type
     * @param bool $return
     * @return mixed|BaseString
     */
    protected function processCall($sequence, callable $callback, $parameters = [], $type = self::SEPARATED, $return = false)
    {
        if ($sequence) {
            return $this->processSequenceCall($sequence, $callback, $parameters, $type, $return);
        } else {
            return $this->processNonSequenceCall($callback, $parameters, $return);
        }
    }

    /**
     * @param $sequence
     * @param callable $callback
     * @param array $parameters
     * @param string $type
     * @param bool $return
     * @return $this|mixed|BaseString
     */
    protected function processSequenceCall($sequence, callable $callback, $parameters = [], $type = self::SEPARATED, $return = false)
    {
        $sequenceCreator = new StringSequenceCreator($sequence);
        $sequence = $sequenceCreator->getSequence();

        if ($sequence->getType() === 'invalid') {
            return $this->processNonSequenceCall($callback, $parameters, $return);
        }

        $scissors = new StringScissors();
        $glue = new StringGlue();
        $workbench = new Workbench($this, $sequence, $scissors, $glue);
        $workbench->cut();
        $workbench->apply($callback, $parameters, $type, $return);

        if ($return) {
            return $workbench->getResult();
        } else {
            $this->setValue($workbench->getValue());
            return $this;
        }
    }

    /**
     * @param callable $callback
     * @param array $parameters
     * @param bool $return
     * @return mixed|BaseString
     */
    protected function processNonSequenceCall(callable $callback, $parameters = [], $return = false)
    {
        if ($parameters) {
            array_unshift($parameters, $this->value);
        } else {
            $parameters = [$this->value];
        }

        $result = call_user_func_array($callback, $parameters);

        if (!$return) {
            $this->setValue($result);
        }

        return $return ? $result : $this;
    }
}