<?php

require_once(__DIR__."/../db/db.php");
require_once(__DIR__."/signer.php.php");

if (isset($_POS["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"]; 

// doplnit condition

    if (condition) {
        // validace
        $signer = new Signer($connection);
        $signer -> update_user($username, $password, $confirmPassword);
        header("Location: login.php");
    }
}


?>