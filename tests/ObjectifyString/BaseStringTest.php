<?php

namespace Objectify\Tests\ObjectifyString;

use Objectify\ObjectifyString\BaseString;
use Objectify\ObjectifyString\ObjectifyString;
use PHPUnit\Framework\TestCase;

class BaseStringTest extends TestCase
{
    public function provider()
    {
        $objectify = new ObjectifyString("hello");
        return $objectify;
    }

    public function testGetValue()
    {
        $objectify = $this->provider();
        $this->assertSame('hello', $objectify->getValue());
    }

    public function testToString()
    {
        $objectify = $this->provider();
        $this->expectOutputString('hello');
        echo $objectify;
    }

    public function testOffsetGet()
    {
        $objectify = $this->provider();
        $this->assertSame('h', $objectify[0]);
    }

    public function testOffsetUnset()
    {
        $objectify = $this->provider();
        unset($objectify[2]);
        $this->assertSame('helo', $objectify->getValue());
    }

    public function testOffsetSet()
    {
        $objectify = $this->provider();
        $objectify[5] = 's';
        $this->assertSame('hellos', $objectify->getValue());
    }

    public function testCount()
    {
        $objectify = $this->provider();
        $this->assertSame(5, $objectify->count());
    }

    public function testSetValue()
    {
        $objectify = $this->provider();
        $objectify->setValue('mess');
        $this->assertSame('mess', $objectify->getValue());
    }

    public function testInvoke()
    {
        $objectify = $this->provider();
        $this->assertSame(':)', $objectify(':)')->getValue());
    }

    public function testOffsetExists()
    {
        $objectify = $this->provider();
        $this->assertSame(true, isset($objectify[0]));
        $this->assertSame(false, isset($objectify[6]));
    }

    public function testImplode()
    {
        $objectify = ObjectifyString::implode("", ["h", "e", "l", "l", "o"]);
        $this->assertSame(ObjectifyString::class,  get_class($objectify));
        $this->assertSame("hello",  $objectify->getValue());
    }
}
