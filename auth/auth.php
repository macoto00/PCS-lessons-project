<?php
require_once(__DIR__."/crypt.php");
require_once(__DIR__."/iauth.php");

class Auth implements IAuth
{
    private mysqli $connection;
    private const TABLE_NAME = "USERS";
    private Crypt $crypt;

    public function __construct(mysqli $conn)
    {
        $this -> connection = $conn;
        $this -> crypt = new Crypt();
    }

    public function check_user(string $userName, string $password) : bool
    {
        $encrypted_password = $this -> crypt -> encrypt($password);
        $sql = "SELECT * FROM ".self::TABLE_NAME." WHERE UserName = '$userName' AND password = '$encrypted_password'";
        $res = $this -> connection -> query($sql);
        if($res -> num_rows === 0)
        {
            return false;
        }
        return true;
    }
    
    public function logout() : void
    {
        session_start();
        setcookie("username", "", time() - 86400 * 10); // Programove vyprseni cookie na strane klienta
        unset($_COOKIE["username"]); // Odstraneni cookie na strane serveru
        setcookie("password", "", time() - 86400 * 10);
        unset($_COOKIE["password"]);
        setcookie("remember", "", time() - 86400 * 10);
        unset($_COOKIE["remember"]);
        unset($_SESSION["email"]);
        unset($_SESSION["heslo"]);
        header("Location: ../index.php");
        return;
    }
}

?>