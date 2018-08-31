<?php


namespace Objectify\ObjectifyString;

use Objectify\Bench\StringGlue;
use Objectify\Bench\StringScissors;
use Objectify\Bench\Workbench;
use Objectify\Interfaces\ObjectifyInterface;
use Objectify\Sequence\StringSequenceCreator;

/**
 * Class ObjectifyString
 * @package Objectify\ObjectifyString
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
class ObjectifyString implements ObjectifyInterface
{
    /**
     * @var string
     */
    private $value;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param mixed ...$sequence
     * @return ObjectifyString
     */
    public function uppercase(...$sequence)
    {
        $function = 'strtoupper';
        return $this->process($sequence, $function);
    }

    /**
     * @param $sequence
     * @param $function
     * @return $this
     */
    private function process($sequence, $function)
    {
        if ($sequence) {
            $sequence = new StringSequenceCreator($sequence);
            $scissors = new StringScissors();
            $glue = new StringGlue();
            $workbench = new Workbench($this, $sequence->getSequence(), $scissors, $glue);

            $workbench->cut();
            $workbench->applyOnSeparated($function);
            $this->setValue($workbench->getValue());
        } else {
            $this->setValue(call_user_func($function, $this->value));
        }
        return $this;
    }
}