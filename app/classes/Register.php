<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 15.02.17
 * Time: 16:30
 */

namespace app\classes;


use app\interfaces\RegisterInterface;
use app\interfaces\UserInterface;

class Register implements RegisterInterface
{

    public function saveRegistration(UserInterface $user): void
    {
        // TODO: Implement saveRegistration() method.

    }

    public function restorePassword(UserInterface $user): void
    {
        // TODO: Implement restorePassword() method.

    }

}