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
     * @param callable $callback
     * @param array $parameters
     * @param string $type
     * @param bool $return
     * @return $this
     */
    public function apply(callable $callback, $parameters = [], $type = ObjectifyInterface::SEPARATED, $return = false)
    {
        if ($type === ObjectifyInterface::OTHER) {
            $this->applyOnOther($callback, $parameters);
        } else {
            $this->applyOnSeparated($callback, $parameters, $return);
        }
        return $this;
    }

    /**
     * @param callable $callback
     * @param array $parameters
     * @return $this
     */
    private function applyOnOther(callable $callback, $parameters = [])
    {
        $this->separated->setBeginning($this->call($this->separated->getBeginning(), $callback, $parameters));
        $this->separated->setEnding($this->call($this->separated->getEnding(), $callback, $parameters));
        return $this;
    }

    /**
     * @param callable $callback
     * @param array $parameters
     * @param bool $return
     * @return $this
     */
    private function applyOnSeparated(callable $callback, $parameters = [], $return = false)
    {
        $result = $this->call($this->separated->getMiddle(), $callback, $parameters);

        if ($return) {
            $this->separated->setResult($result);
        } else {
            $this->separated->setMiddle($result);
        }

        return $this;
    }

    /**
     * @param $part
     * @param callable $callback
     * @param array $parameters
     * @return mixed
     */
    private function call($part, callable $callback, $parameters = [])
    {
        if ($parameters) {
            array_unshift($parameters, $part);
        } else {
            $parameters = [$part];
        }

        return call_user_func_array($callback, $parameters);
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->glue->glue($this->separated);
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->separated->getResult();
    }
}
