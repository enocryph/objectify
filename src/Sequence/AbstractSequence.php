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

    public function prepare()
    {
        return $this;
    }

    abstract public function getType(): string;

    abstract public function isValid(): bool;
}
