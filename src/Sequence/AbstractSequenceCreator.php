<?php


namespace Objectify\Sequence;

use Objectify\Sequence\Exceptions\SequenceException;

abstract class AbstractSequenceCreator
{
    /**
     * @var mixed
     */
    protected $inputSequence;

    /**
     * @var BaseSequence
     */
    protected $sequence;

    /**
     * SequenceCreator constructor.
     * @param $inputSequence
     * @throws \Exception
     */
    public function __construct($inputSequence)
    {
        if (is_array($inputSequence)) {
            $this->inputSequence = implode(',', $inputSequence);
        } else {
            $this->inputSequence = $inputSequence;
        }

        foreach ($this->getAvailableSequences() as $sequenceClassName) {
            $sequenceClass = "\Objectify\Sequence\\{$sequenceClassName}Sequence";

            /** @var BaseSequence $sequence */
            $sequence = new $sequenceClass($this->inputSequence);

            if ($sequence->isValid()) {
                $this->sequence = $sequence;
            }
        }

        if (!$this->sequence) {
            throw new SequenceException('Invalid sequence : ' . $this->inputSequence);
        }
    }
    
    public function getSequence(): BaseSequence
    {
        return $this->sequence;
    }

    abstract public function getAvailableSequences(): array;
}
