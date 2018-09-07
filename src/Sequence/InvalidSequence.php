<?php


namespace Objectify\Sequence;

use Objectify\Sequence\Interfaces\SequenceInterface;

/**
 * Class InvalidSequence
 * @package Objectify\Sequence
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
class InvalidSequence extends BaseSequence implements SequenceInterface
{
    /**
     * @return string
     */
    public function getType(): string
    {
        return 'invalid';
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return false;
    }
}