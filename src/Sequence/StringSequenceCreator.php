<?php


namespace Objectify\Sequence;

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