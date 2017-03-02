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

                    break;

                case "delete":

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

        self::$content = NewsControllerSQL::getAllNews();
    }



}