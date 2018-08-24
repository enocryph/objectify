<?php


namespace Objectify\Sequence\Interfaces;

interface RegexSequenceInterface
{
    public function getRegex(): string;

    public function getMatchGroup(): int;
}