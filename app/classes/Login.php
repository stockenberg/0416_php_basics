<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 15.02.17
 * Time: 16:30
 */

namespace app\classes;


use app\database\LoginSQL;
use app\interfaces\LoginInterface;
use app\interfaces\UserInterface;
use app\objects\User;

class Login implements LoginInterface
{


    private function login(UserInterface $user)
    {

        $found = false;

        foreach (LoginSQL::getUsersByUsername($user) as $row => $dbuser) {
            if (password_verify($user->getPassword(), $dbuser["user_password"])) {
                $found = true;
                $user->setEmail($dbuser["user_email"]);
                $user->setRole($dbuser["user_role"]);
                $user->setId($dbuser["user_id"]);

                $_SESSION["active_user"] = $user;
            }
        }

        if (!$found) {
            Notice::set("error", "Benutzername oder Passwort ist falsch");
        }

    }

    public static function logout()
    {
        $_SESSION["active_user"] = [];
    }

    public function validateInput(array $post)
    {
        $status = array();

        if (isset($post["login"]["submit"])) {

            $user = new User();


            if (empty($post["login"]["username"])) {
                $status[] = "bitte nutzernamen!!111";
            } else {
                $user->setUsername($post["login"]["username"]);
            }

            if (empty($post["login"]["password"])) {
                $status[] = "bitte passwort! !!111";
            } else {
                $user->setPassword($post["login"]["password"]);
            }

            if(empty($status)){
                $this->login($user);
            }
        }


    }


}