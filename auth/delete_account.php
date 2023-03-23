<?php

require_once(__DIR__."/../db/db.php");
require_once(__DIR__."/signer.php");
require_once(__DIR__."/auth.php");

if(isset($_POST["delete_account"]))
{
    session_start();
    $signer = new Signer($connection);
    $signer -> delete_account($_SESSION["email"]);
    $auth = new Auth($connection);
    $auth -> logout();
}


?>