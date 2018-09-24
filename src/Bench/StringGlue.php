<?php


namespace Objectify\Bench;

use Objectify\Bench\Interfaces\GlueInterface;

/**
 * Class StringGlue
 * @package Objectify\Bench
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
class StringGlue implements GlueInterface
{
    /**
     * @param Separated $separated
     * @return string
     */
    public function glue(Separated $separated)
    {
        return $separated->getBeginning() . $separated->getMiddle() . $separated->getEnding();
    }
}
