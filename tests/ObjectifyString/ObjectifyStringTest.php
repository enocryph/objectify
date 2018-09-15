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
        $this->assertSame("vo", $objectify("revolution")->slice('2..3')->getValue());

    }

    public function testTrim()
    {
        $objectify = new ObjectifyString("     revolution     ");
        $this->assertSame("revolution", $objectify->trim()->getValue());
        $this->assertSame("revolution", $objectify->strip()->getValue());
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
        $this->assertSame("revolution  ", $objectify->stripLeft()->getValue());

        $objectify = new ObjectifyString("revol       ution  ");
        $this->assertSame("revolution  ", $objectify->ltrim('5..')->getValue());
        $this->assertSame("revolution  ", $objectify->stripLeft('5..')->getValue());
    }

    public function testRightTrim()
    {
        $objectify = new ObjectifyString(" revolution  ");
        $this->assertSame(" revolution", $objectify->rtrim()->getValue());
        $this->assertSame(" revolution", $objectify->stripRight()->getValue());

        $objectify = new ObjectifyString("revol       ution");
        $this->assertSame("revolution", $objectify->rtrim('0..-5')->getValue());
        $this->assertSame("revolution", $objectify->stripRight('0..-5')->getValue());
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
        $this->assertSame(true, $objectify->startsWith('l', true, '2..4'));
        $this->assertSame(true, $objectify->startsWith('L', false, '2..4'));
    }

    public function testEndsWith()
    {
        $objectify = new ObjectifyString("hello world!");
        $this->assertSame(true, $objectify->endsWith('ld!'));
        $this->assertSame(true, $objectify->endsWith('ld!', true, '-6..'));
        $this->assertSame(true, $objectify->endsWith('lo', true, '..4'));
        $this->assertSame(true, $objectify->endsWith('LO', false, '..4'));
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
        $objectify("<body text=%BODY%>");
        $this->assertSame("<body text=black>", $objectify->replace('%body%', 'black', false)->getValue());
    }

    public function testReplaceWith()
    {
        $objectify = new ObjectifyString("it's a part");
        $this->assertSame("it's a trap", $objectify->replaceWith('trap', '-4..')->getValue());
    }

    public function testSplit()
    {
        $string = "abcdef";
        $objectify = new ObjectifyString($string);
        $this->assertSame(str_split($string), $objectify->split());
    }

    public function testCompareWith()
    {
        $string = "Hello";
        $compare = "hello";
        $objectify = new ObjectifyString($string);
        $this->assertSame(strcmp($string, $compare), $objectify->compareWith($compare));
        $this->assertSame(strcasecmp($string, $compare), $objectify->compareWith($compare, false));
    }

    public function testPosition()
    {
        $string = "there Is no knowledge that is not power";
        $needle = "is";
        $objectify = new ObjectifyString($string);
        $this->assertSame(strpos($string, $needle), $objectify->position($needle));
        $this->assertSame(strpos($string, $needle, 10), $objectify->position($needle, 10));

        $this->assertSame(stripos($string, $needle), $objectify->position($needle, 0, false));
        $this->assertSame(stripos($string, $needle, 10), $objectify->position($needle, 10, false));

        $this->assertSame(strrpos($string, $needle), $objectify->position($needle, 0, true, true));
        $this->assertSame(strrpos($string, $needle, 10), $objectify->position($needle, 10, true, true));

        $this->assertSame(strripos($string, $needle), $objectify->position($needle, 0, false, true));
        $this->assertSame(strripos($string, $needle, 10), $objectify->position($needle, 10, false, true));
    }

    public function testUppercaseFirst()
    {
        $objectify = new ObjectifyString("word");
        $this->assertSame("Word", $objectify->uppercaseFirst()->getValue());
    }

    public function testUppercaseWords()
    {
        $objectify = new ObjectifyString("hope is the prison");
        $this->assertSame("Hope Is The Prison", $objectify->uppercaseWords()->getValue());
    }

    public function testLowercaseFirst()
    {
        $objectify = new ObjectifyString("Hope is the prison");
        $this->assertSame("hope is the prison", $objectify->lowercaseFirst()->getValue());
    }

    public function testWordWrap()
    {
        $text = "The quick brown fox jumped over the lazy dog.";
        $objectify = new ObjectifyString($text);
        $this->assertSame(wordwrap($text, 20), $objectify->wordwrap(20)->getValue());
    }
}
