<?php


namespace Objectify\Sequence;

use Objectify\Sequence\Interfaces\SequenceInterface;

class InvalidSequence extends BaseSequence implements SequenceInterface
{
    public function getType(): string
    {
        return 'invalid';
    }

    public function isValid(): bool
    {
        return false;
    }
}