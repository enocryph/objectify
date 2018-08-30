<?php


namespace Objectify\Sequence;

/**
 * Class ArraySequenceCreator
 * @package Objectify\Sequence
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
class ArraySequenceCreator extends AbstractSequenceCreator
{
    /**
     * Return available sequences types for array objects
     * @return array
     */
    public function getAvailableSequences(): array
    {
        return [
            'Index',
            'Length',
            'Range',
        ];
    }
}
