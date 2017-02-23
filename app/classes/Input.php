<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 23.02.17
 * Time: 16:06
 */

namespace app\classes;


class Input
{

    private $fields = ["username" => "Benutzername", "password" => "Passwort", "email" => "E-Mail-Adresse"];

    // Todo: to get more flexibility, provide obj as parameter and dont instanciate User in Line 19
    public function validateRegister(array $post){

        $user = new User();

        foreach ($post as $field => $input){

            if($input === ""){
                Notice::set($field, "Bitte fülle das Feld: " . $this->fields[$field]);
            }else{
                if($field !== "submit"){

                    /** $action will be the function which is called with
                     * dynamic name, name is set by formField and will be Username,
                     * Password, etc... which results in setUsername() setPassword() ....
                     */

                    $action = "set" . ucfirst($field);
                    $user->$action($input);
                }

            }


        }
        $user->setRole(3);

        if(empty(Notice::getAll())){
            Notice::set("success", "Registrierung war Erfolgreich!");
            return $user;
        }

        return false;


    }



}