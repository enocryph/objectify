<?php


namespace Objectify\Bench\Interfaces;

use Objectify\Bench\Separated;

/**
 * Interface GlueInterface
 * @package Objectify\Bench\Interfaces
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
interface GlueInterface
{
    /**
     * @param Separated $separated
     * @return mixed
     */
    public function glue(Separated $separated);
}
