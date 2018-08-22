<?php


namespace Objectify\Sequence;

class RegexSequence extends AbstractRegexSequence
{
    public function getType(): string
    {
        return 'regex';
    }

    public function isValid(): bool
    {
        $matches = [];

        if (preg_match($this->getValidationRegex(), $this->inputSequence, $matches)) {
            list (, $regex) = $matches;
            return is_numeric(preg_match($regex, 'nvm'));
        }

        return false;
    }

    public function getValidationRegex(): string
    {
        return '/(\/.+\/),?([\d]+)?/';
    }

    public function prepare()
    {
        return $this;
    }

    public function getInputSequence(): string
    {
        return $this->inputSequence;
    }

    public function getRegex(): string
    {

    }

    public function getMatchGroup(): int
    {

    }
}