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

    public function testInvalidSequenceCall()
    {
        $objectify = new ObjectifyString("revolution");
        $this->assertSame("REVOLUTION", $objectify->uppercase('nvm:)')->getValue());
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

    public function testStartsWith()
    {
        $objectify = new ObjectifyString("hello world!");
        $this->assertSame(true, $objectify->startsWith('hel'));
        $this->assertSame(true, $objectify->startsWith('wo', false, '-6..'));
        $this->assertSame(true, $objectify->startsWith('l', false, '2..4'));
        $this->assertSame(true, $objectify->startsWith('L', true, '2..4'));
    }

    public function testEndsWith()
    {
        $objectify = new ObjectifyString("hello world!");
        $this->assertSame(true, $objectify->endsWith('ld!'));
        $this->assertSame(true, $objectify->endsWith('ld!', false, '-6..'));
        $this->assertSame(true, $objectify->endsWith('lo', false, '..4'));
        $this->assertSame(true, $objectify->endsWith('LO', true, '..4'));
    }

    public function testAppend()
    {
        $objectify = new ObjectifyString("hello world");
        $this->assertSame("hello world!", $objectify->append('!')->getValue());
        $this->assertSame("hello! world!", $objectify->append('!', '..4')->getValue());
    }

    public function testPrepend()
    {
        $objectify = new ObjectifyString("hello world");
        $this->assertSame("!hello world", $objectify->prepend('!')->getValue());
        $this->assertSame("!hello !world", $objectify->prepend('!', -5, null)->getValue());
    }

    public function testAppendBoth()
    {
        $objectify = new ObjectifyString("hello world");
        $this->assertSame("he!ll!o world", $objectify->appendBoth('!', 2, 2)->getValue());
        $this->assertSame("!hello world!", $objectify('hello world')->appendBoth('!')->getValue());
    }

    public function testPad()
    {
        $objectify = new ObjectifyString("world");
        $this->assertSame("-=- world -=-", $objectify->pad($objectify->length() + 10, " -=- ", STR_PAD_BOTH)->trim()->getValue());
    }

    public function testRepeat()
    {
        $objectify = new ObjectifyString("=+=");
        $this->assertSame("=+==+==+==+==+=", $objectify->repeat(5)->getValue());

        $objectify = new ObjectifyString("p v p");
        $this->assertSame("p vvv p", $objectify->repeat(3, 2)->getValue());
    }

    public function testReplace()
    {
        $objectify = new ObjectifyString("it's a part");
        $this->assertSame("it's a trap", $objectify->replace('part', 'trap')->getValue());
    }

    public function testReplaceWith()
    {
        $objectify = new ObjectifyString("it's a part");
        $this->assertSame("it's a trap", $objectify->replaceWith('trap', '-4..')->getValue());
    }
}
