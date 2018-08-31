<?php


namespace Objectify\Bench;

use Objectify\Bench\Interfaces\SeparatedInterface;

/**
 * Class Separated
 * @package Objectify\Bench
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
class Separated implements SeparatedInterface
{
    /**
     * @var mixed
     */
    private $beginning;

    /**
     * @var mixed
     */
    private $middle;

    /**
     * @var mixed
     */
    private $ending;

    /**
     * @return mixed
     */
    public function getBeginning()
    {
        return $this->beginning;
    }

    /**
     * @param mixed $beginning
     */
    public function setBeginning($beginning)
    {
        $this->beginning = $beginning;
    }

    /**
     * @return mixed
     */
    public function getMiddle()
    {
        return $this->middle;
    }

    /**
     * @param mixed $middle
     */
    public function setMiddle($middle)
    {
        $this->middle = $middle;
    }

    /**
     * @return mixed
     */
    public function getEnding()
    {
        return $this->ending;
    }

    /**
     * @param mixed $ending
     */
    public function setEnding($ending)
    {
        $this->ending = $ending;
    }

}