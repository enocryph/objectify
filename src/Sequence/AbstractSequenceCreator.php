<?php


namespace Objectify\Sequence;

use Objectify\Sequence\Exceptions\SequenceException;
use Objectify\Sequence\Interfaces\NumericSequenceInterface;
use Objectify\Sequence\Interfaces\RegexSequenceInterface;
use Objectify\Sequence\Interfaces\SequenceInterface;

/**
 * Class AbstractSequenceCreator
 * @package Objectify\Sequence
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
abstract class AbstractSequenceCreator
{
    /**
     * @var mixed
     */
    protected $inputSequence;

    /**
     * @var SequenceInterface
     */
    protected $sequence;

    /**
     * SequenceCreator constructor.
     * @param $inputSequence
     */
    public function __construct($inputSequence)
    {
        if (is_array($inputSequence)) {
            $this->inputSequence = implode(',', $inputSequence);
        } else {
            $this->inputSequence = $inputSequence;
        }

        foreach ($this->getAvailableSequences() as $sequenceClassName) {
            $sequenceClass = "\Objectify\Sequence\\" . $sequenceClassName . "Sequence";

            /** @var NumericSequenceInterface | RegexSequenceInterface $sequence */
            $sequence = new $sequenceClass($this->inputSequence);

            if ($sequence->isValid()) {
                $this->sequence = $sequence;
            }
        }

        if (!$this->sequence) {
            $this->sequence = new InvalidSequence($this->inputSequence);
        }
    }

    /**
     * @return BaseSequence|NumericSequenceInterface|RegexSequenceInterface
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * @return array
     */
    abstract public function getAvailableSequences(): array;
}
