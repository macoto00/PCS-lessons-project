<?php

    if(isset($_COOKIE["remember"]) && (!isset($_COOKIE["username"]) || !isset($_COOKIE["password"])))
    {
        header("./login.php");
    }

?>