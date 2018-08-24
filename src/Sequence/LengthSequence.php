<?php


namespace Objectify\Sequence;

use Objectify\Sequence\Interfaces\NumericSequenceInterface;

class LengthSequence extends BaseSequence implements NumericSequenceInterface
{
    private $start;

    private $length;

    public function getType(): string
    {
        return 'length';
    }

    public function isValid(): bool
    {
        $matches = [];

        if (preg_match($this->getValidationRegex(), $this->inputSequence, $matches)) {
            list(, $this->start, $this->length) = $matches;
            return true;
        }
        return false;
    }

    public function getInputSequence(): string
    {
        return $this->inputSequence;
    }

    public function getValidationRegex(): string
    {
        return '/^(-?[\'\d\']+)\,\s?(-?[\'\d\']+)/';
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