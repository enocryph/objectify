<?php


namespace Objectify\Sequence;

class LengthSequence extends AbstractNumericSequence
{
    private $from;

    private $to;

    public function getType(): string
    {
        return 'length';
    }

    public function isValid(): bool
    {
        return (is_numeric($this->inputSequence) && is_int((int)$this->inputSequence));
    }

    public function getInputSequence(): string
    {
        return $this->inputSequence;
    }

    public function prepare()
    {
        $this->from = 0;
        $this->to = 0;
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