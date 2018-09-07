<?php

namespace Objectify\Tests\Bench;

use Objectify\Bench\StringGlue;
use Objectify\Bench\StringScissors;
use Objectify\Bench\Workbench;
use Objectify\ObjectifyString\ObjectifyString;
use Objectify\Sequence\StringSequenceCreator;
use PHPUnit\Framework\TestCase;

class WorkbenchTest extends TestCase
{
    public function testWorkbenchForStringsWithSeparated()
    {
        $sequenceCreator = new StringSequenceCreator('-2..');
        $sequence = $sequenceCreator->getSequence();
        $objectify = new ObjectifyString('power');

        $scissors = new StringScissors();
        $glue = new StringGlue();
        $workbench = new Workbench($objectify, $sequence, $scissors, $glue);

        $workbench->cut();
        $workbench->applyOnSeparated('strtoupper');
        $this->assertSame('powER', $workbench->getValue());

        $sequenceCreator = new StringSequenceCreator('-1');
        $sequence = $sequenceCreator->getSequence();
        $workbench = new Workbench($objectify, $sequence, $scissors, $glue);

        $workbench->cut();
        $workbench->applyOnSeparated('strtoupper');
        $this->assertSame('poweR', $workbench->getValue());
    }

    public function testWorkbenchForStringsWithOthers()
    {
        $sequenceCreator = new StringSequenceCreator('-2..');
        $sequence = $sequenceCreator->getSequence();
        $objectify = new ObjectifyString('power');

        $scissors = new StringScissors();
        $glue = new StringGlue();
        $workbench = new Workbench($objectify, $sequence, $scissors, $glue);

        $workbench->cut();
        $workbench->applyOnOther('strtoupper');
        $this->assertSame('POWer', $workbench->getValue());

        $sequenceCreator = new StringSequenceCreator('-1');
        $sequence = $sequenceCreator->getSequence();
        $workbench = new Workbench($objectify, $sequence, $scissors, $glue);

        $workbench->cut();
        $workbench->applyOnOther('strtoupper');
        $this->assertSame('POWEr', $workbench->getValue());
    }
}
