<?php


namespace Objectify\Sequence;

use Objectify\Sequence\Interfaces\NumericSequenceInterface;

class IndexSequence extends BaseSequence implements NumericSequenceInterface
{
    private $index;

    public function getType(): string
    {
        return 'index';
    }

    public function isValid(): bool
    {
        if (is_numeric($this->inputSequence) && is_int((int)$this->inputSequence)) {
            $this->index = (int)$this->inputSequence;
            return true;
        }

        return false;
    }

    public function getInputSequence(): string
    {
        return $this->inputSequence;
    }

    public function getFrom(): int
    {
        return 0;
    }

    public function getTo(): int
    {
        return 0;
    }
}