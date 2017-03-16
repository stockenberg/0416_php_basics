<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 01.02.17
 * Time: 17:39
 */
namespace app\classes;


use app\database\UserAdminSQL;

class App
{

    public $content;
    private $request;
    public $whitelist = [
        "frontend" => [
            "home" => "Startseite",
            "about" => "About",
            "login" => "Login",
            "register" => "Register",
            "contact" => "Kontakt",
            "news" => "Nachrichten"
        ],
        "backend" => [
            "user-admin" => "Benutzerverwaltung",
            "news-admin" => "News Verwaltung",
            "tasks" => "Aufgaben",
            "new_task" => "Neue Aufgabe"
        ]
    ];


    public function __construct()
    {
        // Todo : see if you can use this anywhere else
        if (!isset($_SESSION)) {
            session_name("php_basics");
            session_start();
        }
        session_regenerate_id();

        $this->request = array_merge($_GET, $_POST);

    }


    public function getValidPage(string $file_ending, string $default_page = "startseite"): string
    {
        if (isset($this->request["p"])) {
            if ($this->checkLoginState()) {
                if (array_key_exists($this->request["p"],
                        $this->whitelist["frontend"]) || array_key_exists($this->request["p"],
                        $this->whitelist["backend"])
                ) {
                    $page = $this->request["p"];
                } else {
                    $page = $default_page;
                }
            } else {
                if (array_key_exists($this->request["p"], $this->whitelist["frontend"])) {
                    $page = $this->request["p"];
                } else {
                    $page = $default_page;
                }
            }
        } else {
            $page = $default_page;
        }
        return $page . $file_ending;
    }


    public function run()
    {
        // All GET_["p"] parameters exists as classes!

        if (isset($this->request["p"])) {
            switch ($this->request["p"]) {

                case "new_task":
                case "tasks":
                    $taskController = new TasksController();
                    $taskController->run();

                    break;

                case "login":

                    $login = new Login();
                    $login->validateInput($this->request);

                    break;

                case "logout":
                    Login::logout();
                    break;

                case "register":
                    if (isset($this->request["register"]["submit"])) {
                        $input = new Input();
                        $user = $input->validateRegister($this->request["register"]);
                        $reg = new Register();
                        if ($user !== false) {
                            $reg->saveRegistration($user);
                        }
                    }

                    break;

                case "user-admin":

                    if ($_SESSION["active_user"]->getRole() == __ADMIN__) {
                        try {
                             (new UserController())->run();
                        } catch (\Exception $e) {
                            Notice::set("error", $e->getMessage());
                        }
                    } else {
                        header("Location: ?p=home");
                        exit();
                    }
                    break;

                case "news":
                case "news-admin":
                    if ($_SESSION["active_user"]->getRole() == __ADMIN__) {
                        try {
                            (new NewsController())->run();
                        } catch (\Exception $e) {
                            Notice::set("error", $e->getMessage());
                        }
                    } else {
                        header("Location: ?p=home");
                        exit();
                    }
                    break;

                case "contact":
                    $input = new Input();
                    if (isset($this->request["contact"]["submit"])) {
                        $input->validateContact($this->request["contact"]);
                    }
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

