<?php


namespace Objectify\Sequence;

use Objectify\Sequence\Interfaces\NumericSequenceInterface;

class RangeSequence extends BaseSequence implements NumericSequenceInterface
{
    private $from;

    private $to;

    public function getType(): string
    {
        return 'range';
    }

    public function isValid(): bool
    {
        $matches = [];

        if (preg_match($this->getValidationRegex(), $this->inputSequence, $matches)) {
            $this->from = $matches[1] ? (int)$matches[1] : 0;
            $this->to = isset($matches[2]) ? (int)$matches[2] : null;

            if ($matches[1] || isset($matches[2])) {
                return true;
            }
        }

        return false;
    }

    public function getInputSequence(): string
    {
        return $this->inputSequence;
    }

    public function getValidationRegex(): string
    {
        return '/^(-?[\d]+)?\.{2}(-?[\d]+)?/';
    }

    public function getFrom(): int
    {
        return $this->from;
    }

    public function getLength()
    {
        if (is_null($this->to)) {
            return null;
        }

        if ($this->to < 0) {
            return $this->to;
        }

        return $this->to - $this->from + 1;
    }
}
