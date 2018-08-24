<?php


namespace Objectify\Sequence;

use Objectify\Sequence\Interfaces\SequenceInterface;

abstract class BaseSequence implements SequenceInterface
{
    protected $inputSequence;

    public function __construct(string $inputSequence)
    {
        $this->inputSequence = $inputSequence;
    }

    public function getInputSequence(): string
    {
        return $this->inputSequence;
    }
}