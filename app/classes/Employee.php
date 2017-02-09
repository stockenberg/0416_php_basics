<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 09.02.17
 * Time: 16:12
 */

namespace app\classes;


class Employee
{

    private $name;
    private $description;
    private $email;
    private $profile_pic;


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getProfilePic()
    {
        return $this->profile_pic;
    }

    /**
     * @param mixed $profile_pic
     */
    public function setProfilePic($profile_pic)
    {
        $this->profile_pic = $profile_pic;
    }




    
}