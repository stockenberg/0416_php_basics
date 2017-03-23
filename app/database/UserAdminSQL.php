<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 23.02.17
 * Time: 17:34
 */

namespace app\database;


use app\objects\User;
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

    public static function updateUser(User $user)
    {

        $SQL = "UPDATE users 
                SET user_username = :username, user_role = :role, user_email = :email 
                WHERE user_id = :id";

        $arr = [
            ":username" => $user->getUsername(),
            ":role" => $user->getRole(),
            ":email" => $user->getEmail(),
            ":id" => $user->getId()
        ];

        try{
            DB::SET($SQL, $arr);
        }catch (\Exception $e){
            return false;
        }

        return true;
    }

    public static function getUserById(int $id)
    {
        $SQL = "SELECT * FROM users WHERE user_id = :id";
        $arr = [
            ":id" => $id
        ];

        return DB::GETObj($SQL, $arr, "app\\objects\\User");
    }


    public static function delete(int $id)
    {
        $SQL = "DELETE FROM users WHERE user_id = :id";

        $arr = [
            ":id" => $id,
        ];

        DB::SET($SQL, $arr);
    }

}