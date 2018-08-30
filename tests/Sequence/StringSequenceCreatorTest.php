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
        $this->assertSame(2, $sequence->getSequence()->getFrom());
        $this->assertSame(2, $sequence->getSequence()->getLength());
        $this->assertSame('2..3', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator('..3');
        $this->assertEquals('range', $sequence->getSequence()->getType());
        $this->assertSame(0, $sequence->getSequence()->getFrom());
        $this->assertSame(4, $sequence->getSequence()->getLength());
        $this->assertSame('..3', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator('2..');
        $this->assertEquals('range', $sequence->getSequence()->getType());
        $this->assertSame(2, $sequence->getSequence()->getFrom());
        $this->assertSame(null, $sequence->getSequence()->getLength());
        $this->assertSame('2..', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator('-2..-3');
        $this->assertEquals('range', $sequence->getSequence()->getType());
        $this->assertSame(-2, $sequence->getSequence()->getFrom());
        $this->assertSame(-3, $sequence->getSequence()->getLength());
        $this->assertSame('-2..-3', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator('..-3');
        $this->assertEquals('range', $sequence->getSequence()->getType());
        $this->assertSame(0, $sequence->getSequence()->getFrom());
        $this->assertSame(-3, $sequence->getSequence()->getLength());
        $this->assertSame('..-3', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator('-2..');
        $this->assertEquals('range', $sequence->getSequence()->getType());
        $this->assertSame(-2, $sequence->getSequence()->getFrom());
        $this->assertSame(null, $sequence->getSequence()->getLength());
        $this->assertSame('-2..', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator('-3..-1');
        $this->assertEquals('range', $sequence->getSequence()->getType());
        $this->assertSame(-3, $sequence->getSequence()->getFrom());
        $this->assertSame(-1, $sequence->getSequence()->getLength());
        $this->assertSame('-3..-1', $sequence->getSequence()->getInputSequence());
    }

    public function testLength()
    {
        $sequence = new StringSequenceCreator('2,3');
        $this->assertEquals('length', $sequence->getSequence()->getType());
        $this->assertSame(2, $sequence->getSequence()->getFrom());
        $this->assertSame(3, $sequence->getSequence()->getLength());
        $this->assertSame('2,3', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator([2, 4]);
        $this->assertEquals('length', $sequence->getSequence()->getType());
        $this->assertSame(2, $sequence->getSequence()->getFrom());
        $this->assertSame(4, $sequence->getSequence()->getLength());
        $this->assertSame('2,4', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator([2, -3]);
        $this->assertEquals('length', $sequence->getSequence()->getType());
        $this->assertSame(2, $sequence->getSequence()->getFrom());
        $this->assertSame(-3, $sequence->getSequence()->getLength());
        $this->assertSame('2,-3', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator([-2, 3]);
        $this->assertEquals('length', $sequence->getSequence()->getType());
        $this->assertSame(-2, $sequence->getSequence()->getFrom());
        $this->assertSame(3, $sequence->getSequence()->getLength());
        $this->assertSame('-2,3', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator([-2, -7]);
        $this->assertEquals('length', $sequence->getSequence()->getType());
        $this->assertSame(-2, $sequence->getSequence()->getFrom());
        $this->assertSame(-7, $sequence->getSequence()->getLength());
        $this->assertSame('-2,-7', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator('-2, 3');
        $this->assertEquals('length', $sequence->getSequence()->getType());
        $this->assertSame(-2, $sequence->getSequence()->getFrom());
        $this->assertSame(3, $sequence->getSequence()->getLength());
        $this->assertSame('-2, 3', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator('-2, -7');
        $this->assertEquals('length', $sequence->getSequence()->getType());
        $this->assertSame(-2, $sequence->getSequence()->getFrom());
        $this->assertSame(-7, $sequence->getSequence()->getLength());
        $this->assertSame('-2, -7', $sequence->getSequence()->getInputSequence());
    }

    public function testIndex()
    {
        $sequence = new StringSequenceCreator(1);
        $this->assertEquals('index', $sequence->getSequence()->getType());
        $this->assertSame(1, $sequence->getSequence()->getFrom());
        $this->assertSame(1, $sequence->getSequence()->getLength());
        $this->assertSame('1', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator(-1);
        $this->assertEquals('index', $sequence->getSequence()->getType());
        $this->assertSame(-1, $sequence->getSequence()->getFrom());
        $this->assertSame(1, $sequence->getSequence()->getLength());
        $this->assertSame('-1', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator('1');
        $this->assertEquals('index', $sequence->getSequence()->getType());
        $this->assertSame(1, $sequence->getSequence()->getFrom());
        $this->assertSame(1, $sequence->getSequence()->getLength());
        $this->assertSame('1', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator('-1');
        $this->assertEquals('index', $sequence->getSequence()->getType());
        $this->assertSame(-1, $sequence->getSequence()->getFrom());
        $this->assertSame(1, $sequence->getSequence()->getLength());
        $this->assertSame('-1', $sequence->getSequence()->getInputSequence());
    }

    public function testRegex()
    {
        $sequence = new StringSequenceCreator('/[aeiou](.)\1/');
        $this->assertEquals('regex', $sequence->getSequence()->getType());
        $this->assertSame('/[aeiou](.)\1/', $sequence->getSequence()->getRegex());
        $this->assertSame('/[aeiou](.)\1/', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator(['/[aeiou](.)\1/', 1]);
        $this->assertEquals('regex', $sequence->getSequence()->getType());
        $this->assertSame('/[aeiou](.)\1/', $sequence->getSequence()->getRegex());
        $this->assertSame(1, $sequence->getSequence()->getMatchGroup());
        $this->assertSame('/[aeiou](.)\1/,1', $sequence->getSequence()->getInputSequence());

        $sequence = new StringSequenceCreator('/[aeiou](.)\1/, 1');
        $this->assertEquals('regex', $sequence->getSequence()->getType());
        $this->assertSame('/[aeiou](.)\1/', $sequence->getSequence()->getRegex());
        $this->assertSame(1, $sequence->getSequence()->getMatchGroup());
        $this->assertSame('/[aeiou](.)\1/, 1', $sequence->getSequence()->getInputSequence());

        $this->expectException(SequenceException::class);
        $sequence = new StringSequenceCreator('/[aeiou](.)\1, 1');

    }
}
