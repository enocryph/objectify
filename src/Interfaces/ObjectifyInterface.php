<?php


namespace Objectify\Interfaces;

/**
 * Interface ObjectifyInterface
 * @package Objectify\Interfaces
 * @author Vadim Perevoz <enocryph@gmail.com>
 */
interface ObjectifyInterface
{
    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @param $value
     * @return mixed
     */
    public function setValue($value);

    /**
     * @var string
     */
    const SEPARATED = 'SEPARATED';
    /**
     * @var string
     */
    const OTHER = 'OTHER';
}