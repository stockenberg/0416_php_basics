<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 01.02.17
 * Time: 18:23
 */
class Example
{
    public $ex_second;

    public function __construct()
    {

    }
}


class Example_second extends Example
{
    function say(){

    }
}


$ex = new Example_second();
