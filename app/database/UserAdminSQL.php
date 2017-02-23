<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 23.02.17
 * Time: 17:34
 */

namespace app\database;


use app\classes\User;
use app\traits\DB;

class UserAdminSQL
{

    use DB;

    public static function getAllUsers()
    {
        $SQL = "SELECT * FROM users WHERE user_role > :role";
        $execArr = [
            ":role" => 1
        ];

        return DB::GET($SQL, $execArr);

    }

}