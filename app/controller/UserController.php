<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 02.03.17
 * Time: 15:45
 */

namespace app\controller;


use app\classes\Input;
use app\database\UserAdminSQL;

class UserController extends Controller
{

    public $request;

    public function run()
    {
        $this->request = array_merge($_GET, $_POST);

        if(isset($this->request["action"])){
            switch ($this->request["action"]){

                case "edit":
                    self::$content["user_edit"] = UserAdminSQL::getUserById($this->request["id"]);
                    if (isset($this->request["save"])) {
                        $user = (new Input())->validate($this->request["update"]);
                        $user->setId($this->request["id"]);

                        if (UserAdminSQL::updateUser($user)) {
                            header("Location: ?p=user-admin");
                            exit();
                        }
                    }
                    break;

                case "delete":

                    UserAdminSQL::delete($this->request["id"]);
                    header("Location: ?p=user-admin");
                    exit();

                    break;

            }
        }
        // READ

        self::$content["users"] = UserAdminSQL::getAllUsers();

    }

}

