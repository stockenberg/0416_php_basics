<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 15.02.17
 * Time: 17:15
 */

namespace app\traits;

use \PDO as PDO;


trait DB
{

    public static $db;

    public static function getDBInstance(): PDO
    {

        $db = new PDO("mysql:host=localhost;dbname=cms", "marten", "1234");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;

    }

    public static function GET(string $sql, array $execArr = array()): array
    {
        self::$db = self::getDBInstance();

        $stmt = self::$db->prepare($sql);
        $stmt->execute($execArr);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function GETObj(string $sql, array $execArr = array(), string $classname)
    {
        self::$db = self::getDBInstance();

        $stmt = self::$db->prepare($sql);
        $stmt->execute($execArr);

        return $stmt->fetchObject($classname);

    }


    public static function SET(string $sql, array $execArr = array())
    {
        self::$db = self::getDBInstance();

        $stmt = self::$db->prepare($sql);
        $stmt->execute($execArr);

    }


}