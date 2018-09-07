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

    public function __construct($value)
    {
        $this->value = $value;
    }

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

    /**
     * @param $sequence
     * @param $function
     * @return $this
     */
    protected function processSequenceCall($sequence, $function)
    {
        if ($sequence) {
            $sequenceCreator = new StringSequenceCreator($sequence);
            $sequence = $sequenceCreator->getSequence();

            if ($sequence->getType() !== 'invalid') {
                $scissors = new StringScissors();
                $glue = new StringGlue();
                $workbench = new Workbench($this, $sequence, $scissors, $glue);

                $workbench->cut();
                $workbench->applyOnSeparated($function);
                $this->setValue($workbench->getValue());
            } else {
                $this->processNormalCall($function);
            }

        } else {
            $this->processNormalCall($function);
        }

        return $this;
    }

    protected function processNormalCall($function)
    {
        $this->setValue(call_user_func($function, $this->value));
        return $this;
    }

    protected function processNormalCallWithResult($function)
    {
        return call_user_func($function, $this->value);
    }
}