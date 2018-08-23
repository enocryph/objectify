<?php


namespace Objectify\Sequence;

abstract class AbstractSequence
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

    abstract public function getType(): string;

    abstract public function isValid(): bool;
}
