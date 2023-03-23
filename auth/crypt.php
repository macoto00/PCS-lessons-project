<?php

require_once(__DIR__."/icrypt.php");

class Crypt implements ICrypt
{
    // Udaje pro sifrovani a desifrovani
    private string $CIPHERING = "AES-256-CTR";
    private string $ENCRYPTION_IV = 'adsf123--kHS49-5';
    private string $ENCRYPTION_KEY = "asd1231-fhsjkah";
    private int $ENCRYPTION_OPTIONS = 0;
    
    public function encrypt(string $str) : string
    {
        return openssl_encrypt($str, $this -> CIPHERING, $this -> ENCRYPTION_KEY, $this -> ENCRYPTION_OPTIONS, $this -> ENCRYPTION_IV);
    }

    public function decrypt(string $str) : string
    {
        return openssl_decrypt($str, $this -> CIPHERING, $this -> ENCRYPTION_KEY, $this -> ENCRYPTION_OPTIONS, $this -> ENCRYPTION_IV);
    }
}

?>