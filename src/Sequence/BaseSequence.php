<?php


namespace Objectify\Sequence;

use Objectify\Sequence\Interfaces\SequenceInterface;

/**
 * Class BaseSequence
 * @package Objectify\Sequence
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
abstract class BaseSequence implements SequenceInterface
{
    /**
     * @var string
     */
    protected $inputSequence;

    /**
     * BaseSequence constructor.
     * @param string $inputSequence
     */
    public function __construct(string $inputSequence)
    {
        $this->inputSequence = $inputSequence;
    }

    /**
     * @return string
     */
    public function getInputSequence(): string
    {
        return $this->inputSequence;
    }
}
