<?php


namespace Objectify\Sequence;

use Objectify\Sequence\Interfaces\NumericSequenceInterface;

class StringSequenceCreator extends AbstractSequenceCreator
{
    public function getAvailableSequences(): array
    {
        return [
            'Index',
            'Length',
            'Range',
            'Regex'
        ];
    }
}