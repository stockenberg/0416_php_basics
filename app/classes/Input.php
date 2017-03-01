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

    public function validate(array $post){

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

        if(empty(Notice::getAll())){
            Notice::set("success", "Vorgang erfolgreich ausgeführt!");
            return $user;
        }

        return false;


    }

    public function validateContact(array $post){

        if(empty($post["firstname"])){
            Notice::set("firstname", "Bitte geben Sie einen Vornamen an");
        }

        if(empty($post["lastname"])){
            Notice::set("lastname", "Bitte geben Sie einen Nachnamen an");
        }

        if(empty($post["email"])){
            Notice::set("email", "Bitte geben Sie einen EMail an");
        }

        if(count(Notice::getAll()) < 1){
            $mail = new \PHPMailer();

            $mail->setFrom('no-reply@custom-cms.com', 'Custom CMS');
            $mail->addAddress('m.stockenberg@sae.edu');               // Name is optional
            $mail->addReplyTo($post["email"]);

            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'Neue Email aus dem Kontaktformular';
            $mail->Body    = "Von: {$post["firstname"]} {$post["lastname"]} 
                              <br />
                              Email: {$post["email"]}
                              <br /><br />
                              {$post["message"]}
                              ";

            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                Notice::set("success", "Nachricht versandt!");
            }

        }


    }



}