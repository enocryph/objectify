<?php

namespace Objectify\Tests\Sequence;

use Objectify\Sequence\StringSequenceCreator;
use PHPUnit\Framework\TestCase;

class StringSequenceCreatorTest extends TestCase
{
    public function testRange()
    {
        $factory = new StringSequenceCreator('2..3');
        $this->assertEquals('range', $factory->getSequence()->getType());

        $factory = new StringSequenceCreator('..3');
        $this->assertEquals('range', $factory->getSequence()->getType());

        $factory = new StringSequenceCreator('2..');
        $this->assertEquals('range', $factory->getSequence()->getType());

        $factory = new StringSequenceCreator('-2..-3');
        $this->assertEquals('range', $factory->getSequence()->getType());

        $factory = new StringSequenceCreator('..-3');
        $this->assertEquals('range', $factory->getSequence()->getType());

        $factory = new StringSequenceCreator('-2..');
        $this->assertEquals('range', $factory->getSequence()->getType());
    }

    public function testLength()
    {
        $factory = new StringSequenceCreator('2,3');
        $this->assertEquals('length', $factory->getSequence()->getType());

        $factory = new StringSequenceCreator([2, 4]);
        $this->assertEquals('length', $factory->getSequence()->getType());

        $factory = new StringSequenceCreator([2, -3]);
        $this->assertEquals('length', $factory->getSequence()->getType());

        $factory = new StringSequenceCreator([-2, 3]);
        $this->assertEquals('length', $factory->getSequence()->getType());

        $factory = new StringSequenceCreator([-2, -7]);
        $this->assertEquals('length', $factory->getSequence()->getType());

        $factory = new StringSequenceCreator('-2, 3');
        $this->assertEquals('length', $factory->getSequence()->getType());

        $factory = new StringSequenceCreator('-2, -7');
        $this->assertEquals('length', $factory->getSequence()->getType());
    }

    public function testIndex()
    {
        $factory = new StringSequenceCreator(1);
        $this->assertEquals('index', $factory->getSequence()->getType());

        $factory = new StringSequenceCreator(-1);
        $this->assertEquals('index', $factory->getSequence()->getType());

        $factory = new StringSequenceCreator('1');
        $this->assertEquals('index', $factory->getSequence()->getType());

        $factory = new StringSequenceCreator('-1');
        $this->assertEquals('index', $factory->getSequence()->getType());
    }

    public function testRegex()
    {

    }
}
