<?php
require_once(__DIR__."/isigner.php");
require_once(__DIR__."/crypt.php");

class Signer implements ISigner 
{
    private mysqli $connection;
    private const TABLE_NAME = "USERS";
    private Crypt $crypt;

    public function __construct(mysqli $conn)
    {
        $this -> connection = $conn;
        $this -> crypt = new Crypt();
    }

    public function add_user(string $username, string $password, string $confirmPassword, string $firstname, string $lastname) : void
    {
        if($password === $confirmPassword)
        {
            $encrypted_password = $this -> crypt -> encrypt($password);
            $sql = "INSERT INTO ".self::TABLE_NAME."(UserName, Password, FirstName, LastName)VALUES('$username', '$encrypted_password', '$firstname', '$lastname');";
            if(!$this -> connection -> query($sql))
            {
                throw new Exception("Pridani noveho uzivatele selhalo.");
            }
        }
        return;
    }

    public function update_password(string $username, string $newPassword, string $confirmNewPassword) : void
    {
        if($newPassword === $confirmNewPassword)
        {
            $encrypted_password = $this -> crypt -> encrypt($newPassword);
            $sql = "UPDATE ".self::TABLE_NAME." SET password = '$encrypted_password' WHERE UserName = '$username'";
            if(!$this -> connection -> query($sql))
            {
                throw new Exception("Aktualizace hesla uzivatele selhala.");
            }
            return;
        }
    }

    public function delete_account(string $username) : void
    {
        $sql = "DELETE FROM ".self::TABLE_NAME." WHERE UserName = '$username'";
        if(!$this -> connection -> query($sql))
        {
            throw new Exception("Odstraneni uctu uzivatele selhalo.");
        }
        return;
    }

    public function __destruct()
    {
        $this -> connection -> close();
    }
}

?>