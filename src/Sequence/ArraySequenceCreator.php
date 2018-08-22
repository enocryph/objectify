<?php


namespace Objectify\Sequence;

class ArraySequenceCreator extends AbstractSequenceCreator
{
    public function getSequence(): AbstractSequence
    {
        return $this->sequence;
    }

    public function getAvailableSequences(): array
    {
        return [
            'Index',
            'Length',
            'Range',
        ];
    }
}