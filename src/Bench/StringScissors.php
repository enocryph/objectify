<?php


namespace Objectify\Bench;

use Objectify\Bench\Interfaces\RegexScissorsInterface;
use Objectify\Bench\Interfaces\ScissorsInterface;
use Objectify\Bench\Interfaces\SeparatedInterface;
use Objectify\Interfaces\ObjectifyInterface;
use Objectify\Sequence\Interfaces\NumericSequenceInterface;
use function Objectify\ObjectifyString\endsWith;
use Objectify\Sequence\Interfaces\RegexSequenceInterface;

/**
 * Class StringScissors
 * @package Objectify\Bench
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
class StringScissors implements ScissorsInterface, RegexScissorsInterface
{
    /**
     * @param ObjectifyInterface $objectify
     * @param NumericSequenceInterface $sequence
     * @return SeparatedInterface
     * @codeCoverageIgnore
     * @deprecated
     */
    public function indexCut(ObjectifyInterface $objectify, NumericSequenceInterface $sequence): SeparatedInterface
    {
        $separated = new Separated();

        if ($sequence->getFrom() === 0) {
            $separated->setBeginning("");
        } elseif ($sequence->getFrom() === count($objectify->getValue())) {
            $separated->setEnding("");
        }

        $separated->setMiddle($objectify->getValue()[$sequence->getFrom()]);

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
        $separated->setMiddle(substr($objectify->getValue(), $sequence->getFrom(), $sequence->getLength() ?? strlen($objectify->getValue())));

        if ($sequence->getLength() < 0 && $sequence->getFrom() < 0 && $sequence->getFrom() >= $sequence->getLength()) {
            $separated->setBeginning('');
            $separated->setMiddle('');
            $separated->setEnding('');
            return $separated;
        }

        if (!endsWith($objectify->getValue(), $separated->getMiddle())) {
            if ($sequence->getLength() < 0 && $sequence->getFrom() > $sequence->getLength()) {
                $separated->setEnding(substr($objectify->getValue(), $sequence->getLength()));
            } elseif ($sequence->getLength() < 0 && $sequence->getFrom() < 0 && $sequence->getFrom() < $sequence->getLength()) {
                $separated->setEnding(substr($objectify->getValue(), $sequence->getLength(), strlen($objectify->getValue())));
            } else {
                $separated->setEnding(substr($objectify->getValue(), $sequence->getFrom() + $sequence->getLength()));
            }
        } else {
            $separated->setEnding("");
        }

        return $separated;
    }
}