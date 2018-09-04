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
     * @param mixed ...$sequence
     * @return ObjectifyString
     */
    public function uppercase(...$sequence)
    {
        return $this->processSequenceCall($sequence, 'strtoupper');
    }

    /**
     * @param mixed ...$sequence
     * @return ObjectifyString
     */
    public function lowercase(...$sequence)
    {
        return $this->processSequenceCall($sequence, 'strtolower');
    }

    public function trim(...$sequence)
    {
        return $this->processSequenceCall($sequence, 'trim');
    }

    public function ltrim(...$sequence)
    {
        return $this->processSequenceCall($sequence, 'ltrim');
    }

    public function rtrim(...$sequence)
    {
        return $this->processSequenceCall($sequence, 'rtrim');
    }

    /**
     * @param mixed ...$sequence
     * @return ObjectifyString
     */
    public function reverse(...$sequence)
    {
        return $this->processSequenceCall($sequence, 'strrev');
    }

    public function length()
    {
        return $this->processNormalCallWithResult('strlen');
    }
}