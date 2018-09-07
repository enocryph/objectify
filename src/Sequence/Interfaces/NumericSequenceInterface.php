<?php


namespace Objectify\Sequence\Interfaces;

/**
 * Interface NumericSequenceInterface
 * @package Objectify\Sequence\Interfaces
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
interface NumericSequenceInterface extends SequenceInterface
{
    /**
     * @return int
     */
    public function getFrom(): int;


    /**
     * @return int|null
     */
    public function getLength();
}