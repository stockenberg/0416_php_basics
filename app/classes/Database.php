<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 15.02.17
 * Time: 17:15
 */

namespace app\classes;

use app\interfaces\UserInterface;
use \PDO as PDO;


trait Database
{

    public static function getDBInstance() : PDO{

        $db = new PDO("mysql:host=localhost;dbname=cms", "marten", "1234");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;

    }

    public function getUsersByUsername(UserInterface $user){

        $db = self::getDBInstance();

        $SQL = "SELECT * FROM users WHERE user_username = :username";
        $stmt = $db->prepare($SQL);
        $stmt->execute(
            array(
                ":username" => $user->getUsername()
            )
        );

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}