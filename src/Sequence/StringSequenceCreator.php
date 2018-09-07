<?php


namespace Objectify\Sequence;

/**
 * Class StringSequenceCreator
 * @package Objectify\Sequence
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
class StringSequenceCreator extends AbstractSequenceCreator
{
    /**
     * Return available sequences types for strings objects
     * @return array
     */
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