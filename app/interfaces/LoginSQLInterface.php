<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 16.02.17
 * Time: 14:58
 */

namespace app\interfaces;


interface LoginSQLInterface
{

    public static function getUsersByUsername(UserInterface $user): array;

}