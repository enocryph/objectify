<?php

namespace Objectify\Tests\ObjectifyString;

use Objectify\ObjectifyString\ObjectifyString;
use PHPUnit\Framework\TestCase;

class ObjectifyStringTest extends TestCase
{
    public function testLowercase()
    {
        $objectify = new ObjectifyString("revolution");
        $this->assertSame("revolution", $objectify->lowercase()->getValue());
    }

    public function testLength()
    {
        $objectify = new ObjectifyString("revolution");
        $this->assertSame(10, $objectify->length());
    }

    public function testSlice()
    {
        $objectify = new ObjectifyString("revolution");
        $this->assertSame("", $objectify->slice()->getValue());
        $this->assertSame("ev", $objectify("revolution")->slice(1, 2)->getValue());

    }

    public function testTrim()
    {
        $objectify = new ObjectifyString("     revolution     ");
        $this->assertSame("revolution", $objectify->trim()->getValue());
    }

    public function testUppercase()
    {
        $objectify = new ObjectifyString("revolution");
        $this->assertSame("REVOLUTION", $objectify->uppercase()->getValue());
    }

    public function testLeftTrim()
    {
        $objectify = new ObjectifyString("     revolution  ");
        $this->assertSame("revolution  ", $objectify->ltrim()->getValue());

        $objectify = new ObjectifyString("revol       ution  ");
        $this->assertSame("revolution  ", $objectify->ltrim('5..')->getValue());
    }

    public function testRightTrim()
    {
        $objectify = new ObjectifyString(" revolution  ");
        $this->assertSame(" revolution", $objectify->rtrim()->getValue());

        $objectify = new ObjectifyString("revol       ution");
        $this->assertSame("revolution", $objectify->rtrim('0..-5')->getValue());
    }

    public function testReverse()
    {
        $objectify = new ObjectifyString("level");
        $this->assertSame("level", $objectify->reverse()->getValue());

        $objectify = new ObjectifyString("nice");
        $this->assertSame("ecin", $objectify->reverse()->getValue());

        $objectify = new ObjectifyString("it's a trap");
        $this->assertSame("it's a part", $objectify->reverse('-4..')->getValue());
    }
}
