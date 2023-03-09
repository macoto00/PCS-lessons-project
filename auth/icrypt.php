<?php

interface ICrypt {
    public function decrypt(string $heslo) : string;
    public function encrypt(string $heslo) : string;
}

?>