<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 15.02.17
 * Time: 16:26
 */

namespace app\objects;


use app\interfaces\UserInterface;

class User implements UserInterface
{

    private $user_role;
    private $user_id;
    private $user_username;
    private $user_password;
    private $user_email;

    // Todo: we need to overthink the meber names or database names cause:::
    

    /**
     * @return mixed
     */
    public function getRole(): int
    {
        return $this->user_role;
    }

    /**
     * @param mixed $user_role
     */
    public function setRole(int $user_role)
    {
        $this->user_role = $user_role;
    }

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setId(int $user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUsername(): string
    {
        return $this->user_username;
    }

    /**
     * @param mixed $user_username
     */
    public function setUsername(string $user_username)
    {
        $this->user_username = $user_username;
    }

    /**
     * @return mixed
     */
    public function getPassword(): string
    {
        return $this->user_password;
    }

    /**
     * @param mixed $user_password
     */
    public function setPassword(string $user_password)
    {
        $this->user_password = $user_password;
    }

    /**
     * @return mixed
     */
    public function getEmail(): string
    {
        return $this->user_email;
    }

    /**
     * @param mixed $user_email
     */
    public function setEmail(string $user_email)
    {
        $this->user_email = $user_email;
    }


}