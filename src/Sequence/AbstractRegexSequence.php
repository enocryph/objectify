<?php


namespace Objectify\Sequence;

abstract class AbstractRegexSequence extends AbstractSequence
{
    abstract public function getRegex(): string;

    abstract public function getMatchGroup(): int;
}