<?php

require_once(__DIR__."/../db/db.php");
require_once(__DIR__."/auth.php");
require_once(__DIR__."/../validators/loginValidator.php");

$auth = new Auth($connection);

if(isset($_POST["submit"]))
{
    $userName = $_POST["username"];
    $password = $_POST["password"];
    if(!empty($userName) && !empty($password) && isset($userName) && isset($password))
    {
        $validator = new LoginValidator();
        if(!$validator -> validateCredentials($userName, $password))
        {
            header("Location: login.php");
        }
        if(!empty($_POST["remember"]))
        {
            if(!isset($_COOKIE["remember"]))
            {
                setcookie("remember", 1, time() + 86400 * 10); // Vyprsi za 10 dnu
            }
            if(!isset($_COOKIE["username"]))
            {
                setcookie("username", $userName, time() + 86400 * 10); // Vyprsi za 10 dnu
            }
            if(!isset($_COOKIE["password"]))
            {
                setcookie("password", $password, time() + 86400 * 10); // Vyprsi za 10 dnu
            }
        }

        if($auth -> check_user($userName, $password))
        {
            session_start();
            $_SESSION["email"] = $userName;
            $_SESSION["heslo"] = $password;
            $_SESSION["lastname"] = $password;
            header("Location: ../index.php");
        }
        else
        {
            header("Location: login.php");
        }
    }
    else
    {
        header("Location: login.php");
    }
}
else
{
    header("Location: login.php");
}

?>