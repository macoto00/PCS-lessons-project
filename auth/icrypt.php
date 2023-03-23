<?php

interface ICrypt
{
    public function decrypt(string $str) : string;
    public function encrypt(string $str) : string;
}

?>