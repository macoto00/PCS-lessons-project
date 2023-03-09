<?php

require_once(__DIR__."/signer.php");
require_once(__DIR__."/auth.php");
require_once(__DIR__."/../db/db.php");

if(isset($_POST["submit"]))
{
    session_start();
    $signer = new Signer($connection);
    $signer -> delete_account($_SESSION["email"]);
    $auth = new Auth($connection);
    $auth -> logout();
}

?>