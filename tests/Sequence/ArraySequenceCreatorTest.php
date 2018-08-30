<?php

namespace Objectify\Tests\Sequence;

use Objectify\Sequence\ArraySequenceCreator;
use PHPUnit\Framework\TestCase;

class ArraySequenceCreatorTest extends TestCase
{
    public function testRange()
    {
        $sequence = new ArraySequenceCreator('2..3');
        $this->assertEquals('range', $sequence->getSequence()->getType());
        $this->assertSame(2, $sequence->getSequence()->getFrom());
        $this->assertSame(2, $sequence->getSequence()->getLength());
        $this->assertSame('2..3', $sequence->getSequence()->getInputSequence());

        $sequence = new ArraySequenceCreator('..3');
        $this->assertEquals('range', $sequence->getSequence()->getType());
        $this->assertSame(0, $sequence->getSequence()->getFrom());
        $this->assertSame(4, $sequence->getSequence()->getLength());
        $this->assertSame('..3', $sequence->getSequence()->getInputSequence());

        $sequence = new ArraySequenceCreator('2..');
        $this->assertEquals('range', $sequence->getSequence()->getType());
        $this->assertSame(2, $sequence->getSequence()->getFrom());
        $this->assertSame(null, $sequence->getSequence()->getLength());
        $this->assertSame('2..', $sequence->getSequence()->getInputSequence());

        $sequence = new ArraySequenceCreator('-2..-3');
        $this->assertEquals('range', $sequence->getSequence()->getType());
        $this->assertSame(-2, $sequence->getSequence()->getFrom());
        $this->assertSame(-3, $sequence->getSequence()->getLength());
        $this->assertSame('-2..-3', $sequence->getSequence()->getInputSequence());

        $sequence = new ArraySequenceCreator('..-3');
        $this->assertEquals('range', $sequence->getSequence()->getType());
        $this->assertSame(0, $sequence->getSequence()->getFrom());
        $this->assertSame(-3, $sequence->getSequence()->getLength());
        $this->assertSame('..-3', $sequence->getSequence()->getInputSequence());

        $sequence = new ArraySequenceCreator('-2..');
        $this->assertEquals('range', $sequence->getSequence()->getType());
        $this->assertSame(-2, $sequence->getSequence()->getFrom());
        $this->assertSame(null, $sequence->getSequence()->getLength());
        $this->assertSame('-2..', $sequence->getSequence()->getInputSequence());

        $sequence = new ArraySequenceCreator('-3..-1');
        $this->assertEquals('range', $sequence->getSequence()->getType());
        $this->assertSame(-3, $sequence->getSequence()->getFrom());
        $this->assertSame(-1, $sequence->getSequence()->getLength());
        $this->assertSame('-3..-1', $sequence->getSequence()->getInputSequence());
    }

    public function testLength()
    {
        $sequence = new ArraySequenceCreator('2,3');
        $this->assertEquals('length', $sequence->getSequence()->getType());
        $this->assertSame(2, $sequence->getSequence()->getFrom());
        $this->assertSame(3, $sequence->getSequence()->getLength());
        $this->assertSame('2,3', $sequence->getSequence()->getInputSequence());

        $sequence = new ArraySequenceCreator([2, 4]);
        $this->assertEquals('length', $sequence->getSequence()->getType());
        $this->assertSame(2, $sequence->getSequence()->getFrom());
        $this->assertSame(4, $sequence->getSequence()->getLength());
        $this->assertSame('2,4', $sequence->getSequence()->getInputSequence());

        $sequence = new ArraySequenceCreator([2, -3]);
        $this->assertEquals('length', $sequence->getSequence()->getType());
        $this->assertSame(2, $sequence->getSequence()->getFrom());
        $this->assertSame(-3, $sequence->getSequence()->getLength());
        $this->assertSame('2,-3', $sequence->getSequence()->getInputSequence());

        $sequence = new ArraySequenceCreator([-2, 3]);
        $this->assertEquals('length', $sequence->getSequence()->getType());
        $this->assertSame(-2, $sequence->getSequence()->getFrom());
        $this->assertSame(3, $sequence->getSequence()->getLength());
        $this->assertSame('-2,3', $sequence->getSequence()->getInputSequence());

        $sequence = new ArraySequenceCreator([-2, -7]);
        $this->assertEquals('length', $sequence->getSequence()->getType());
        $this->assertSame(-2, $sequence->getSequence()->getFrom());
        $this->assertSame(-7, $sequence->getSequence()->getLength());
        $this->assertSame('-2,-7', $sequence->getSequence()->getInputSequence());

        $sequence = new ArraySequenceCreator('-2, 3');
        $this->assertEquals('length', $sequence->getSequence()->getType());
        $this->assertSame(-2, $sequence->getSequence()->getFrom());
        $this->assertSame(3, $sequence->getSequence()->getLength());
        $this->assertSame('-2, 3', $sequence->getSequence()->getInputSequence());

        $sequence = new ArraySequenceCreator('-2, -7');
        $this->assertEquals('length', $sequence->getSequence()->getType());
        $this->assertSame(-2, $sequence->getSequence()->getFrom());
        $this->assertSame(-7, $sequence->getSequence()->getLength());
        $this->assertSame('-2, -7', $sequence->getSequence()->getInputSequence());
    }

    public function testIndex()
    {
        $sequence = new ArraySequenceCreator(1);
        $this->assertEquals('index', $sequence->getSequence()->getType());
        $this->assertSame(1, $sequence->getSequence()->getFrom());
        $this->assertSame(1, $sequence->getSequence()->getLength());
        $this->assertSame('1', $sequence->getSequence()->getInputSequence());

        $sequence = new ArraySequenceCreator(-1);
        $this->assertEquals('index', $sequence->getSequence()->getType());
        $this->assertSame(-1, $sequence->getSequence()->getFrom());
        $this->assertSame(1, $sequence->getSequence()->getLength());
        $this->assertSame('-1', $sequence->getSequence()->getInputSequence());

        $sequence = new ArraySequenceCreator('1');
        $this->assertEquals('index', $sequence->getSequence()->getType());
        $this->assertSame(1, $sequence->getSequence()->getFrom());
        $this->assertSame(1, $sequence->getSequence()->getLength());
        $this->assertSame('1', $sequence->getSequence()->getInputSequence());

        $sequence = new ArraySequenceCreator('-1');
        $this->assertEquals('index', $sequence->getSequence()->getType());
        $this->assertSame(-1, $sequence->getSequence()->getFrom());
        $this->assertSame(1, $sequence->getSequence()->getLength());
        $this->assertSame('-1', $sequence->getSequence()->getInputSequence());
    }
}
