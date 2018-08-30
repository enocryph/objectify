<?php


namespace Objectify\Sequence;

use Objectify\Sequence\Interfaces\RegexSequenceInterface;

/**
 * Class RegexSequence
 * @package Objectify\Sequence
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
class RegexSequence extends BaseSequence implements RegexSequenceInterface
{
    /**
     * @var
     */
    private $regex;

    /**
     * @var
     */
    private $matchGroup;

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'regex';
    }

    /**
     * @return bool
     */
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

    /**
     * @return string
     */
    public function getValidationRegex(): string
    {
        return '/^(\/.+\/),?(\s?[\d]+)?/';
    }

    /**
     * @return string
     */
    public function getRegex(): string
    {
        return $this->regex;
    }

    /**
     * @return int
     */
    public function getMatchGroup(): int
    {
        return $this->matchGroup;
    }
}
