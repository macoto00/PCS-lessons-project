<?php

interface IAuth
{
    public function check_user(string $userName, string $password) : bool;
    public function logout() : void;
}

?>