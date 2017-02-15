<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 15.02.17
 * Time: 16:02
 */

namespace app\interfaces;


interface LoginInterface
{

    public function validateInput(array $post);
    public static function logout();

}