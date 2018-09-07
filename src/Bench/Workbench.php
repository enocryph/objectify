<?php


namespace Objectify\Bench;

use Objectify\Bench\Interfaces\GlueInterface;
use Objectify\Bench\Interfaces\ScissorsInterface;
use Objectify\Interfaces\ObjectifyInterface;
use Objectify\Sequence\Interfaces\NumericSequenceInterface;
use Objectify\Sequence\Interfaces\SequenceInterface;

/**
 * Class Workbench
 * @package Objectify\Bench
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
class Workbench
{
    /**
     * @var ObjectifyInterface
     */
    private $objectify;

    /**
     * @var SequenceInterface
     */
    private $sequence;

    /**
     * @var ScissorsInterface
     */
    private $scissors;

    /**
     * @var Separated
     */
    private $separated;

    /**
     * @var GlueInterface
     */
    private $glue;

    /**
     * Workbench constructor.
     * @param ObjectifyInterface $objectify
     * @param SequenceInterface $sequence
     * @param ScissorsInterface $scissors
     * @param GlueInterface $glue
     */
    public function __construct(ObjectifyInterface $objectify, SequenceInterface $sequence, ScissorsInterface $scissors, GlueInterface $glue)
    {
        $this->objectify = $objectify;
        $this->sequence = $sequence;
        $this->scissors = $scissors;
        $this->glue = $glue;
    }

    /**
     * @return $this
     */
    public function cut()
    {
        if ($this->sequence instanceof NumericSequenceInterface) {
            if ($this->sequence->getType() === 'index') {
                $this->separated = $this->scissors->normalCut($this->objectify, $this->sequence);
            } else {
                $this->separated = $this->scissors->normalCut($this->objectify, $this->sequence);
            }
        }

        return $this;
    }

    /**
     * @param $function
     * @return $this
     */
    public function applyOnSeparated($function)
    {
        $result = call_user_func($function, $this->separated->getMiddle());
        $this->separated->setMiddle($result);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->glue->glue($this->separated);
    }
}