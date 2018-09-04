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
class ObjectifyString extends BaseString implements ObjectifyInterface
{
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
        return $this->processSequenceCall($sequence, 'strtoupper');
    }


    /**
     * @param $sequence
     * @param $function
     * @return $this
     */
    private function processSequenceCall($sequence, $function)
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

    private function processNormalCall($function)
    {
        $this->setValue(call_user_func($function, $this->value));
        return $this;
    }
}