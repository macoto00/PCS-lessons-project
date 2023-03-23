<?php

require_once(__DIR__."/../db/db.php");
require_once(__DIR__."/auth.php");

if(isset($_POST["logout"]))
{
    $auth = new Auth($connection);
    $auth -> logout();
}

?>