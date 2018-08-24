<?php

namespace Objectify\Tests\Sequence;

use Objectify\Sequence\Exceptions\SequenceException;
use Objectify\Sequence\StringSequenceCreator;
use PHPUnit\Framework\TestCase;

class StringSequenceCreatorTest extends TestCase
{
    public function testRange()
    {
        $sequence = new StringSequenceCreator('2..3');
        $this->assertEquals('range', $sequence->getSequence()->getType());

        $sequence = new StringSequenceCreator('..3');
        $this->assertEquals('range', $sequence->getSequence()->getType());

        $sequence = new StringSequenceCreator('2..');
        $this->assertEquals('range', $sequence->getSequence()->getType());

        $sequence = new StringSequenceCreator('-2..-3');
        $this->assertEquals('range', $sequence->getSequence()->getType());

        $sequence = new StringSequenceCreator('..-3');
        $this->assertEquals('range', $sequence->getSequence()->getType());

        $sequence = new StringSequenceCreator('-2..');
        $this->assertEquals('range', $sequence->getSequence()->getType());
    }

    public function testLength()
    {
        $sequence = new StringSequenceCreator('2,3');
        $this->assertEquals('length', $sequence->getSequence()->getType());

        $sequence = new StringSequenceCreator([2, 4]);
        $this->assertEquals('length', $sequence->getSequence()->getType());

        $sequence = new StringSequenceCreator([2, -3]);
        $this->assertEquals('length', $sequence->getSequence()->getType());

        $sequence = new StringSequenceCreator([-2, 3]);
        $this->assertEquals('length', $sequence->getSequence()->getType());

        $sequence = new StringSequenceCreator([-2, -7]);
        $this->assertEquals('length', $sequence->getSequence()->getType());

        $sequence = new StringSequenceCreator('-2, 3');
        $this->assertEquals('length', $sequence->getSequence()->getType());

        $sequence = new StringSequenceCreator('-2, -7');
        $this->assertEquals('length', $sequence->getSequence()->getType());
    }

    public function testIndex()
    {
        $sequence = new StringSequenceCreator(1);
        $this->assertEquals('index', $sequence->getSequence()->getType());

        $sequence = new StringSequenceCreator(-1);
        $this->assertEquals('index', $sequence->getSequence()->getType());

        $sequence = new StringSequenceCreator('1');
        $this->assertEquals('index', $sequence->getSequence()->getType());

        $sequence = new StringSequenceCreator('-1');
        $this->assertEquals('index', $sequence->getSequence()->getType());
    }

    public function testRegex()
    {
        $sequence = new StringSequenceCreator('/[aeiou](.)\1/');
        $this->assertEquals('regex', $sequence->getSequence()->getType());

        $sequence = new StringSequenceCreator('/[aeiou](.)\1/', 1);
        $this->assertEquals('regex', $sequence->getSequence()->getType());

        $this->expectException(SequenceException::class);
        $sequence = new StringSequenceCreator('/[aeiou](.)\1, 1');
    }
}
