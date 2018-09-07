<?php


namespace Objectify\Sequence;

use Objectify\Sequence\Interfaces\NumericSequenceInterface;

/**
 * Class LengthSequence
 * @package Objectify\Sequence
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
class LengthSequence extends BaseSequence implements NumericSequenceInterface
{
    /**
     * @var
     */
    private $start;

    /**
     * @var
     */
    private $length;

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'length';
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        $matches = [];

        if (preg_match($this->getValidationRegex(), $this->inputSequence, $matches)) {
            $this->start = $matches[1];
            $this->length = isset($matches[2]) && $matches[2] !== 'null' ? (int)$matches[2] : null;

            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    public function getValidationRegex(): string
    {
        return '/^(-?[\'\d\']+)\,\s?(-?[\'\d\']+|null)?$/';
    }

    /**
     * @return int
     */
    public function getFrom(): int
    {
        return $this->start;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }
}
