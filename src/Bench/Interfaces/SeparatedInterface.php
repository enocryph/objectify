<?php


namespace Objectify\Bench\Interfaces;

/**
 * Interface SeparatedInterface
 * @package Objectify\Bench\Interfaces
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
interface SeparatedInterface
{
    /**
     * @return mixed
     */
    public function getBeginning();

    /**
     * @return mixed
     */
    public function getMiddle();

    /**
     * @return mixed
     */
    public function getEnding();

    /**
     * @return mixed
     */
    public function getResult();

    /**
     * @param $beginning
     * @return mixed
     */
    public function setBeginning($beginning);

    /**
     * @param $middle
     * @return mixed
     */
    public function setMiddle($middle);

    /**
     * @param $ending
     * @return mixed
     */
    public function setEnding($ending);

    /**
     * @param $result
     * @return mixed
     */
    public function setResult($result);
}