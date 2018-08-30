<?php


namespace Objectify\Sequence;

use Objectify\Sequence\Interfaces\NumericSequenceInterface;

/**
 * Class IndexSequence
 * @package Objectify\Sequence
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
class IndexSequence extends BaseSequence implements NumericSequenceInterface
{
    /**
     * @var
     */
    private $index;

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'index';
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        if (is_numeric($this->inputSequence) && is_int((int)$this->inputSequence)) {
            $this->index = (int)$this->inputSequence;
            return true;
        }

        return false;
    }

    /**
     * @return int
     */
    public function getFrom(): int
    {
        return $this->index;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return 1;
    }
}
