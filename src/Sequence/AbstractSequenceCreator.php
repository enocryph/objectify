<?php


namespace Objectify\Sequence;

abstract class AbstractSequenceCreator
{
    /**
     * @var mixed
     */
    protected $inputSequence;

    /**
     * @var AbstractSequence
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
            $this->inputSequence = implode(',', $this->inputSequence);
        } else {
            $this->inputSequence = $inputSequence;
        }

        foreach ($this->getAvailableSequences() as $sequenceClassName) {
            $sequenceClass = "\Objectify\Sequence\\{$sequenceClassName}Sequence";

            /** @var AbstractSequence $sequence */
            $sequence = new $sequenceClass($this->inputSequence);

            if ($sequence->isValid()) {
                $sequence->prepare();
                $this->sequence = $sequence;
            }
        }

        if (!$this->sequence) {
            throw new \Exception('Invalid sequence : ' . $this->inputSequence);
        }
    }

    abstract public function getSequence(): AbstractSequence;

    abstract public function getAvailableSequences(): array;
}
