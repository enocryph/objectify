<?php


namespace Objectify\Bench\Interfaces;

use Objectify\Interfaces\ObjectifyInterface;
use Objectify\Sequence\Interfaces\NumericSequenceInterface;

/**
 * Interface ScissorsInterface
 * @package Objectify\Bench\Interfaces
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
interface ScissorsInterface
{
    /**
     * @param ObjectifyInterface $objectify
     * @param NumericSequenceInterface $sequence
     * @return SeparatedInterface
     */
    public function indexCut(ObjectifyInterface $objectify, NumericSequenceInterface $sequence): SeparatedInterface;

    /**
     * @param ObjectifyInterface $objectify
     * @param NumericSequenceInterface $sequence
     * @return SeparatedInterface
     */
    public function normalCut(ObjectifyInterface $objectify, NumericSequenceInterface $sequence): SeparatedInterface;
}