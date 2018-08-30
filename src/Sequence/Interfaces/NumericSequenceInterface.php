<?php


namespace Objectify\Sequence\Interfaces;

interface NumericSequenceInterface extends SequenceInterface
{
    public function getFrom(): int;

    public function getLength();
}