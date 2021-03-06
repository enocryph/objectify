<?php

namespace Objectify\Tests\Bench;

use Objectify\Bench\StringScissors;
use Objectify\ObjectifyString\ObjectifyString;
use Objectify\Sequence\StringSequenceCreator;
use PHPUnit\Framework\TestCase;

class StringScissorsTest extends TestCase
{
    public function testNormalCutWithLengthSequence()
    {
        $separated = $this->getSeparatedWithNormalCut('there is no knowledge, that is not power', 1, 2);
        $this->assertSame('t', $separated->getBeginning());
        $this->assertSame('he', $separated->getMiddle());
        $this->assertSame('re is no knowledge, that is not power', $separated->getEnding());

        $separated = $this->getSeparatedWithNormalCut('there is no knowledge, that is not power', 1, -1);
        $this->assertSame('t', $separated->getBeginning());
        $this->assertSame('here is no knowledge, that is not powe', $separated->getMiddle());
        $this->assertSame('r', $separated->getEnding());

        $separated = $this->getSeparatedWithNormalCut('there is no knowledge, that is not power', -5, -2);
        $this->assertSame('there is no knowledge, that is not ', $separated->getBeginning());
        $this->assertSame('pow', $separated->getMiddle());
        $this->assertSame('er', $separated->getEnding());

        $separated = $this->getSeparatedWithNormalCut('there is no knowledge, that is not power', -2, -5);
        $this->assertSame('', $separated->getBeginning());
        $this->assertSame('', $separated->getMiddle());
        $this->assertSame('', $separated->getEnding());

        $separated = $this->getSeparatedWithNormalCut('there is no knowledge, that is not power', 0, -5);
        $this->assertSame('', $separated->getBeginning());
        $this->assertSame('there is no knowledge, that is not ', $separated->getMiddle());
        $this->assertSame('power', $separated->getEnding());

        $separated = $this->getSeparatedWithNormalCut('there is no knowledge, that is not power', -5, null);
        $this->assertSame('there is no knowledge, that is not ', $separated->getBeginning());
        $this->assertSame('power', $separated->getMiddle());
        $this->assertSame('', $separated->getEnding());
    }

    public function testIndexCut()
    {
        $separated = $this->getSeparatedWithIndexCut('there is no knowledge, that is not power', 0);
        $this->assertSame('', $separated->getBeginning());
        $this->assertSame('t', $separated->getMiddle());
        $this->assertSame('here is no knowledge, that is not power', $separated->getEnding());

        $separated = $this->getSeparatedWithIndexCut('there is no knowledge, that is not power', 39);
        $this->assertSame('there is no knowledge, that is not powe', $separated->getBeginning());
        $this->assertSame('r', $separated->getMiddle());
        $this->assertSame('', $separated->getEnding());

        $separated = $this->getSeparatedWithIndexCut('there is no knowledge, that is not power', 4);
        $this->assertSame('ther', $separated->getBeginning());
        $this->assertSame('e', $separated->getMiddle());
        $this->assertSame(' is no knowledge, that is not power', $separated->getEnding());

        $separated = $this->getSeparatedWithIndexCut('there is no knowledge, that is not power', -1);
        $this->assertSame('there is no knowledge, that is not powe', $separated->getBeginning());
        $this->assertSame('r', $separated->getMiddle());
        $this->assertSame('', $separated->getEnding());
    }

    public function testNoralCutWithRangeSequence()
    {
        $separated = $this->getSeparatedWithNormalCut('there is no knowledge, that is not power', '1..2');
        $this->assertSame('t', $separated->getBeginning());
        $this->assertSame('he', $separated->getMiddle());
        $this->assertSame('re is no knowledge, that is not power', $separated->getEnding());

        $separated = $this->getSeparatedWithNormalCut('there is no knowledge, that is not power', '1..-1');
        $this->assertSame('t', $separated->getBeginning());
        $this->assertSame('here is no knowledge, that is not powe', $separated->getMiddle());
        $this->assertSame('r', $separated->getEnding());

        $separated = $this->getSeparatedWithNormalCut('there is no knowledge, that is not power', '-5..-2');
        $this->assertSame('there is no knowledge, that is not ', $separated->getBeginning());
        $this->assertSame('pow', $separated->getMiddle());
        $this->assertSame('er', $separated->getEnding());

        $separated = $this->getSeparatedWithNormalCut('there is no knowledge, that is not power', '-2..-5');
        $this->assertSame('', $separated->getBeginning());
        $this->assertSame('', $separated->getMiddle());
        $this->assertSame('', $separated->getEnding());

        $separated = $this->getSeparatedWithNormalCut('there is no knowledge, that is not power', '..-5');
        $this->assertSame('', $separated->getBeginning());
        $this->assertSame('there is no knowledge, that is not ', $separated->getMiddle());
        $this->assertSame('power', $separated->getEnding());

        $separated = $this->getSeparatedWithNormalCut('there is no knowledge, that is not power', '-5..');
        $this->assertSame('there is no knowledge, that is not ', $separated->getBeginning());
        $this->assertSame('power', $separated->getMiddle());
        $this->assertSame('', $separated->getEnding());

        $separated = $this->getSeparatedWithNormalCut('there is no knowledge, that is not power', '0..0');
        $this->assertSame('', $separated->getBeginning());
        $this->assertSame('', $separated->getMiddle());
        $this->assertSame('there is no knowledge, that is not power', $separated->getEnding());
    }

    /**
     * @param $string
     * @param mixed ...$inputSequence
     * @return \Objectify\Bench\Interfaces\SeparatedInterface
     */
    private function getSeparatedWithNormalCut($string, ...$inputSequence)
    {
        $objectify = new ObjectifyString($string);
        $sequenceCreator = new StringSequenceCreator($inputSequence);
        $sequence = $sequenceCreator->getSequence();
        $scissors = new StringScissors();
        $separated = $scissors->normalCut($objectify, $sequence);
        return $separated;
    }

    /**
     * @param $string
     * @param mixed ...$inputSequence
     * @return \Objectify\Bench\Interfaces\SeparatedInterface
     */
    private function getSeparatedWithIndexCut($string, ...$inputSequence)
    {
        $objectify = new ObjectifyString($string);
        $sequenceCreator = new StringSequenceCreator($inputSequence);
        $sequence = $sequenceCreator->getSequence();
        $scissors = new StringScissors();
        $separated = $scissors->normalCut($objectify, $sequence);
        return $separated;
    }
}
