<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 16.02.17
 * Time: 14:33
 */

namespace app\database;


use app\interfaces\LoginSQLInterface;
use app\interfaces\UserInterface;
use app\traits\DB;

class LoginSQL implements LoginSQLInterface
{

    use DB;

    public static function getUsersByUsername(UserInterface $user): array
    {

        $SQL = "SELECT * FROM users WHERE user_username = :username";
        $exec = array(
            ":username" => $user->getUsername()
        );

        return DB::GET($SQL, $exec);
    }

}