<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 02.03.17
 * Time: 15:54
 */

namespace app\controller;


abstract class Controller
{

    public static $content;


    public abstract function run();


    public static function getContent()
    {
        return self::$content;
    }

}