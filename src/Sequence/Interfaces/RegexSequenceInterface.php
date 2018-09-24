<?php


namespace Objectify\Sequence\Interfaces;

interface RegexSequenceInterface extends SequenceInterface
{
    public function getRegex(): string;

    public function getMatchGroup(): int;
}
