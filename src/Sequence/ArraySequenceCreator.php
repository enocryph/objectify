<?php


namespace Objectify\Sequence;

class ArraySequenceCreator extends AbstractSequenceCreator
{
    public function getAvailableSequences(): array
    {
        return [
            'Index',
            'Length',
            'Range',
        ];
    }
}