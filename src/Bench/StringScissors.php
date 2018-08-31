<?php


namespace Objectify\Bench;

use Objectify\Bench\Interfaces\ScissorsInterface;
use Objectify\Bench\Interfaces\SeparatedInterface;
use Objectify\Interfaces\ObjectifyInterface;
use Objectify\Sequence\Interfaces\NumericSequenceInterface;

/**
 * Class StringScissors
 * @package Objectify\Bench
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
class StringScissors implements ScissorsInterface
{
    /**
     * @param ObjectifyInterface $objectify
     * @param NumericSequenceInterface $sequence
     * @return SeparatedInterface
     */
    public function indexCut(ObjectifyInterface $objectify, NumericSequenceInterface $sequence): SeparatedInterface
    {
        $separated = new Separated();
        return $separated;
    }

    /**
     * @param ObjectifyInterface $objectify
     * @param NumericSequenceInterface $sequence
     * @return SeparatedInterface
     */
    public function normalCut(ObjectifyInterface $objectify, NumericSequenceInterface $sequence): SeparatedInterface
    {
        $separated = new Separated();
        $separated->setBeginning(substr($objectify->getValue(), 0, $sequence->getFrom()));
        $separated->setMiddle(substr($objectify->getValue(), $sequence->getFrom(), $sequence->getLength()));

        if (!$this->endsWith($objectify->getValue(), $separated->getMiddle())) {
            $separated->setEnding(substr($objectify->getValue(), $sequence->getFrom() + $sequence->getLength()));
        } else {
            $separated->setEnding("");
        }

        return $separated;
    }

    /**
     * @param $haystack
     * @param $needle
     * @return bool
     */
    private function endsWith($haystack, $needle)
    {
        return substr($haystack, -strlen($needle)) === $needle;
    }
}