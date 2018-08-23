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
        $matches = [];

        if (preg_match($this->getValidationRegex(), $this->inputSequence, $matches)) {

            $this->from = isset($matches[1]) ? $matches[1] : 0;
            $this->to = isset($matches[2]) ? $matches[2] : 'END';

            if (isset($matches[1]) || isset($matches[2])) {
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
        return '/(-?[\d]+)?\.{2}(-?[\d]+)?/';
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
