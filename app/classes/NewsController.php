<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 02.03.17
 * Time: 16:30
 */

namespace app\classes;


use app\database\NewsControllerSQL;

class NewsController extends Controller
{

    public $request;

    public function run()
    {

        $this->request = array_merge($_GET, $_POST);

        if(isset($this->request["action"])){
            switch ($this->request["action"]){

                case "edit":
                    self::$content["edit"] = NewsControllerSQL::getNewsById($this->request["id"]);
                    $input = new Input();
                    if(isset($this->request["news"])){
                        $newsObj = $input->validateNewsInput($this->request["news"]);
                        NewsControllerSQL::updateNews($newsObj);
                        header("Location: ?p=news-admin");
                        exit();
                    }
                    break;

                case "delete":
                    NewsControllerSQL::deleteNews($this->request["id"]);
                    header("Location: ?p=news-admin");
                    exit();
                    break;

                case "insert":

                    $input = new Input();
                    if(isset($this->request["news"])){
                        $newsObj = $input->validateNewsInput($this->request["news"]);
                        NewsControllerSQL::insertNews($newsObj);
                        header("Location: ?p=news-admin");
                        exit();
                    }
                    break;

            }
        }

        self::$content["all"] = NewsControllerSQL::getAllNews();
    }



}