<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 01.02.17
 * Time: 17:39
 */
namespace app\classes;


class App
{

    public $content;
    private $request;
    public $whitelist = [
        "startseite" => "Startseite",
        "about" => "About",
        "login" => "Login",
        "register" => "Register"
    ];

    public function __construct()
    {
        // Todo : see if you can use this anywhere else
        session_name("php_basics");
        session_start();
        session_regenerate_id();

        $this->request = array_merge($_GET, $_POST);
    }


    public function getValidPage(string $file_ending, string $default_page = "startseite"): string
    {
        if (isset($this->request["p"])) {
            if (array_key_exists($this->request["p"], $this->whitelist)) {
                $page = $this->request["p"];
            } else {
                $page = $default_page;
            }
        } else {
            $page = $default_page;
        }
        return $page . $file_ending;
    }


    public function run()
    {
        if (isset($this->request["p"])) {
            switch ($this->request["p"]) {

                case "login":

                    $login = new Login();
                    $login->validateInput($this->request);

                    break;

                case "logout":
                    Login::logout();
                    break;

                case "register":

                    break;

            }
        }
    }

    public function checkLoginState(): bool
    {
        if (isset($_SESSION["active_user"]) && count($_SESSION["active_user"]) > 0) {
            return true;
        }

        return false;
    }

    /**
     * @return string maybe useless
     */
    public function getRequestValue(string $key): string
    {
        if (isset($this->request[$key])) {
            return $this->request[$key];
        }

        return "";
    }

}

