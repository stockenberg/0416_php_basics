<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 15.02.17
 * Time: 16:13
 */

namespace app\interfaces;


interface UserInterface
{

    function getRole(): int;

    function getId(): int;

    function getUsername(): string;

    function getPassword(): string;

    function getEmail(): string;


    function setRole(int $role);

    function setId(int $id);

    function setUsername(string $username);

    function setPassword(string $password);

    function setEmail(string $email);


}