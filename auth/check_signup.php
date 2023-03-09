<?php

require_once(__DIR__."/../db/db.php");
require_once(__DIR__."/signer.php");

if(isset($_POST["submit"])) {
    $userName = $_POST["UserName"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["ConfirmPassword"];
    $firstName = $_POST["FirstName"];
    $lastName = $_POST["LastName"];
    if (isset($userName) && isset($password) && isset($ConfirmPassword) && isset($FirstName) && isset($LastName) && !empty($userName) && !empty($password) && !empty($confirmPassword) && !empty($FirstName) && !empty($LastName)) {
        // validace
        $signer = new Signer($connection);
        $signer -> add_user($userName, $password, $confirmPassword, $firstName, $lastName);
    }
}

header("Location: login.php");

?>