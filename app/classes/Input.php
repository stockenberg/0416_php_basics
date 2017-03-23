<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 23.02.17
 * Time: 16:06
 */

namespace app\classes;


use app\objects\News;
use app\objects\User;

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

    public function validateNewsInput(array $post) : News{
        $News = new News();

        if(!empty($post["news_title"])){
            $News->setNewsTitle($post["news_title"]);
        }else{
            Notice::set("news_title", "Kein Titel angegeben!");
        }

        if(!empty($post["news_text"])){
            $News->setNewsText($post["news_text"]);
        }else{
            Notice::set("news_text", "Kein Text angegeben!");
        }

        if(!empty($post["old_news_file"])){
            $News->setNewsImage($post["old_news_file"]);
        }

        if(isset($_GET["id"])){
            $News->setNewsId($_GET["id"]);
        }

        if(count(Notice::getAll()) < 1){
            if(isset($_FILES)){
                if($_FILES["news"]["error"]["news_file"] > 0){
                    if($News->getNewsImage() == ""){
                        Notice::set("error", "FEHLER!!!1111^");
                    }
                }else{
                    $tmp_name = $_FILES["news"]["tmp_name"]["news_file"];
                    $real_name = $_FILES["news"]["name"]["news_file"];
                    $dest = "public/uploads/";

                    // IF permission denied error do the following: chmod 747 uploads/ in terminal
                    if(move_uploaded_file($tmp_name, $dest . $real_name)){
                        Notice::set("success", "Bild Upload erfolgreich!");
                        $News->setNewsImage($real_name);

                    }else{
                        Notice::set("error", "Fehler bei Bildupload");
                    }



                }
            }
        }



        $News->setNewsAuthorId($_SESSION["active_user"]->getId());

        return $News;
    }



}