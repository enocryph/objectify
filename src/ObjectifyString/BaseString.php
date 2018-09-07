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
     * @param $function
     * @param $type
     * @return $this
     */
    protected function processCall($sequence, $function, $type = self::SEPARATED)
    {
        if ($sequence) {
            $sequenceCreator = new StringSequenceCreator($sequence);
            $sequence = $sequenceCreator->getSequence();

            if ($sequence->getType() !== 'invalid') {
                $scissors = new StringScissors();
                $glue = new StringGlue();
                $workbench = new Workbench($this, $sequence, $scissors, $glue);

                $workbench->cut();

                if ($type === self::OTHER) {
                    $workbench->applyOnOther($function);
                } else {
                    $workbench->applyOnSeparated($function);
                }

                $this->setValue($workbench->getValue());
            } else {
                $this->processNormalCall($function);
            }

        } else {
            $this->processNormalCall($function);
        }

        return $this;
    }

    /**
     * @param $function
     * @return $this
     */
    protected function processNormalCall($function)
    {
        $this->setValue(call_user_func($function, $this->value));
        return $this;
    }

    /**
     * @param $function
     * @return mixed
     */
    protected function processNormalCallWithResult($function)
    {
        return call_user_func($function, $this->value);
    }
}