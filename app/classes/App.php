<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 01.02.17
 * Time: 17:39
 */
require "ArticleController.php";

class App
{

    public $content;
    private $request;
    private $whitelist = ["startseite" => "Startseite", "about" => "About", "cart" => "Cart", "articles" => "Articles"];

    const ERROR_ON = -1;

    public function __construct()
    {
        // Todo : see if you can use this anywhere else
        session_name("php_basics");
        session_start();
        session_regenerate_id();

        self::ERROR_ON;

        $this->request = array_merge($_GET, $_POST);
    }


    public function getValidPage(string $file_ending, string $default_page = "home") : string
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

                case "startseite":

                    break;

                case "about":

                    break;

                case "cart":

                    break;

                case "articles":

                    $this->content = new ArticleController();
                    $this->content->createArticles();
                    $this->content->addToCart();

                    break;

            }
        }
    }

    /**
     * @return string
     */
    public function getRequestValue(string $key): string
    {
        if(isset($this->request[$key])){
            return $this->request[$key];
        }

        return "";
    }

}