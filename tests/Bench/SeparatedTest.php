<?php

namespace Objectify\Tests\Bench;

use Objectify\Bench\Separated;
use PHPUnit\Framework\TestCase;

class SeparatedTest extends TestCase
{
    public function testStringSeparated()
    {
        $separated = new Separated();
        $separated->setBeginning('beginning');
        $separated->setMiddle('middle');
        $separated->setEnding('ending');
        $this->assertSame('beginning', $separated->getBeginning());
        $this->assertSame('middle', $separated->getMiddle());
        $this->assertSame('ending', $separated->getEnding());
    }

    public function testArraySeparated()
    {
        $separated = new Separated();
        $separated->setBeginning([1, 2, 3]);
        $separated->setMiddle([4, 5, 6]);
        $separated->setEnding([7, 8, 9]);
        $this->assertSame([1, 2, 3], $separated->getBeginning());
        $this->assertSame([4, 5, 6], $separated->getMiddle());
        $this->assertSame([7, 8, 9], $separated->getEnding());
    }
}
