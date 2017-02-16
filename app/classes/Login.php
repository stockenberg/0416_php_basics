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
            echo "FEHLER";
        }

    }

    public static function logout()
    {
        $_SESSION["active_user"] = [];
    }

    public function validateInput(array $post)
    {

        if (isset($post["login"]["submit"])) {

            $user = new User();

            if (empty($post["login"]["username"])) {
                // Add no username notice
            } else {
                $user->setUsername($post["login"]["username"]);
            }

            if (empty($post["login"]["password"])) {
                // add no password notice
            } else {
                $user->setPassword($post["login"]["password"]);
            }


            $this->login($user);
        }


    }


}