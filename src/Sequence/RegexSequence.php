<?php


namespace Objectify\Sequence;

class RegexSequence extends AbstractRegexSequence
{
    private $regex;

    private $matchGroup;

    public function getType(): string
    {
        return 'regex';
    }

    public function isValid(): bool
    {
        $matches = [];

        if (preg_match($this->getValidationRegex(), $this->inputSequence, $matches)) {

            if (isset($matches[2])) {
                $this->matchGroup = $matches[2];
            }

            $this->regex = $matches[1];

            return is_numeric(preg_match($matches[1], 'nvm'));
        }

        return false;
    }

    public function getValidationRegex(): string
    {
        return '/(\/.+\/),?([\d]+)?/';
    }

    public function getInputSequence(): string
    {
        return $this->inputSequence;
    }

    public function getRegex(): string
    {
        return $this->regex;
    }

    public function getMatchGroup(): int
    {
        return $this->matchGroup;
    }
}