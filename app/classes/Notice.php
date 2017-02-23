<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 16.02.17
 * Time: 16:25
 */

namespace app\classes;

class Notice implements \app\interfaces\NoticeInterface
{

    private static $arr = [];


    public static function get(string $key = ""): string
    {
        if(isset(self::$arr[$key])){
            return self::$arr[$key];
        }
        return "";

    }

    public static function getAll() : array
    {
        if(!empty(self::$arr)){
            return self::$arr;
        }

        return array();
    }

    public static function set(string $key, string $value)
    {
       self::$arr[$key] = $value;
    }




}