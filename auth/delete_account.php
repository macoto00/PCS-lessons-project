<?php

require_once(__DIR__."/signer.php");
require_once(__DIR__."/auth.php");
require_once(__DIR__."/../db/db.php");

if(isset($_POST["submit"]))
{
    session_start();
    $signer = new Signer($connection);
    $signer -> delete_user($_SESSION["email"]); 
    
    // ==================================
    // == změna oproti kódu Alexe ==
    // ==================================

    // Alexey zde má $signer -> delete_account($_SESSION["email"]); 
    
    // ===== háže mi to chybu, myslím si, že je to odkaz na smazání, který máme definovaný jako delete_user a ne delete_account =====

    $auth = new Auth($connection);
    $auth -> logout();
}

?>