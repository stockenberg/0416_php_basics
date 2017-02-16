<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 15.02.17
 * Time: 16:26
 */

namespace app\classes;


use app\interfaces\UserInterface;

class User implements UserInterface
{

    private $role;
    private $id;
    private $username;
    private $password;
    private $email;

    /**
     * @return mixed
     */
    public function getRole(): int
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole(int $role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }


}