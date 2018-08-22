<?php


namespace Objectify\Sequence;

class StringSequenceCreator extends AbstractSequenceCreator
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
            'Regex'
        ];
    }
}