<?php

namespace Objectify\Tests\Bench;

use Objectify\Bench\Separated;
use Objectify\Bench\StringGlue;
use PHPUnit\Framework\TestCase;

class StringGlueTest extends TestCase
{
    public function testGlue()
    {
        $separated = new Separated();
        $separated->setBeginning('beginning');
        $separated->setMiddle(' middle ');
        $separated->setEnding('ending');
        $glue = new StringGlue();
        $this->assertSame("beginning middle ending", $glue->glue($separated));
    }
}
