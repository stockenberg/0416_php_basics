<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 15.02.17
 * Time: 16:16
 */

namespace app\interfaces;


interface RegisterInterface
{

    public function saveRegistration(UserInterface $user);
    public function restorePassword(UserInterface $user);

}