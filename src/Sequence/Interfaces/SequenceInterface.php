<?php


namespace Objectify\Sequence\Interfaces;

interface SequenceInterface
{
    public function getInputSequence(): string;

    public function getType(): string;

    public function isValid(): bool;
}
