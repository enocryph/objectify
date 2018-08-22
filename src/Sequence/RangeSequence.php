<?php


namespace Objectify\Sequence;

class RangeSequence extends AbstractNumericSequence
{
    private $from;

    private $to;

    public function getType(): string
    {
        return 'range';
    }

    public function isValid(): bool
    {
        return false;
    }

    public function getInputSequence(): string
    {
        return $this->inputSequence;
    }

    public function prepare()
    {
        return $this;
    }

    public function getFrom(): int
    {
        return $this->from;
    }

    public function getTo(): int
    {
        return $this->to;
    }
}
