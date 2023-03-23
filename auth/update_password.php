<?php

require_once(__DIR__."/../db/db.php");
require_once(__DIR__."/signer.php");
require_once(__DIR__."/../validators/forgotValidator.php");

if(isset($_POST["update_password"]))
{
    if(isset($_POST["username"]) && isset($_POST["new_password"]) && isset($_POST["confirm_new_password"]) &&
       !empty($_POST["username"]) && !empty($_POST["new_password"]) && !empty($_POST["confirm_new_password"]))
    {
        $username = $_POST["username"];
        $newPassword = $_POST["new_password"];
        $confirmNewPassword = $_POST["confirm_new_password"];
        $validator = new ForgotValidator();
        if(!$validator -> validateForgot($username, $newPassword, $confirmNewPassword))
        {
            header("Location: login.php");
        }
        $signer = new Signer($connection);
        $signer -> update_password($username, $newPassword, $confirmNewPassword);
        header("Location: login.php");
    }
}

?>