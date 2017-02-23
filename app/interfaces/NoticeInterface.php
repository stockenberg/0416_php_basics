<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 16.02.17
 * Time: 16:11
 */

namespace app\interfaces;


interface NoticeInterface
{

    public static function get(string $key) : string;
    public static function set(string $key, string $value);
    public static function getAll() : array ;

}