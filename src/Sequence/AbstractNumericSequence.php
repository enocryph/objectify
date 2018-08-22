<?php


namespace Objectify\Sequence;

abstract class AbstractNumericSequence extends AbstractSequence
{
    abstract public function getFrom(): int;

    abstract public function getTo(): int;
}