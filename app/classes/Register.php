<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 15.02.17
 * Time: 16:30
 */

namespace app\classes;


use app\interfaces\RegisterInterface;
use app\interfaces\UserInterface;
use app\traits\DB;

class Register implements RegisterInterface
{


    public function saveRegistration(UserInterface $user)
    {

        $SQL = "INSERT INTO users (user_username, user_password, user_email, user_role) VALUES (:user_username, :user_password, :user_email, :user_role)";

        $execArr = [
            ":user_username" => $user->getUsername(),
            ":user_password" => password_hash($user->getPassword(), PASSWORD_DEFAULT, ["cost" => 12]),
            ":user_email" => $user->getEmail(),
            ":user_role" => $user->getRole()
        ];

        try{
            DB::SET($SQL, $execArr);
        }catch (\Exception $e){
            if($e->getCode() == 23000){
                Notice::set("error", "E-Mail-Adresse bereits vorhanden");
            }else{
                echo "Error: " . $e->getMessage();
            }
        }
    }

    public function restorePassword(UserInterface $user)
    {
        // TODO: Implement restorePassword() method.

    }



}