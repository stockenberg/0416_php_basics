<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 01.02.17
 * Time: 18:23
 */

namespace app\classes;


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
