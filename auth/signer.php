<?php

require_once(__DIR__."/isigner.php");
require_once(__DIR__."/crypt.php");

class Signer implements ISigner {

    private mysqli $connection;
    private const TABLE_NAME = "Users";
    private Crypt $crypt;

    public function __construct(mysqli $conn)
    {
        $this -> connection = $conn;
        $this -> crypt = new Crypt();
    }

    public function add_user(string $username, string $password, string $confirmPassword, string $firstName, string $lastName) : void
    {
        if ($password === $confirmPassword) {
            $enc_password = $this -> crypt -> encrypt($password);
            $sql = "INSERT INTO ".self::TABLE_NAME."(UserName, Password, FirstName, LastName)VALUES('$username', '$enc_password', '$firstName', '$lastName')";
            if (!$this -> connection -> query($sql)) {
                throw new Exception("Pridani noveho uzivatele selhalo");
            }
        }
    }

    public function update_user(string $username, string $newPassword, string $confirmNewPassword) : void
    {
        if ($newPassword === $confirmNewPassword) {
            $enc_password = $this -> crypt -> encrypt($newPassword);
            $sql = "UPDATE ".self::TABLE_NAME." SET password = '$enc_password' WHERE UserName = '$username'";
            if (!$this -> connection -> query($sql)) {
                throw new Exception("Aktualizace hesla uzivatele selhala");
            }
        }
    }

    public function delete_user(string $username) : void 
    {
        $sql = "DELETE FROM ".self::TABLE_NAME." WHERE UserName = '$username'";
        if (!$this -> connection -> query($sql)) {
            throw new Exception("Smazani uzivatele selhalo");
        }
    }
}

?>