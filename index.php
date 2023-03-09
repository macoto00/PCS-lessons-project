<?php

session_start();

require_once(__DIR__."/db/db.php");
require_once(__DIR__."/dal/ItemRepository.php");
require_once(__DIR__."/auth/crypt.php");
require_once(__DIR__."/auth/auth.php");

$auth = new Auth($connection);

if(!isset($_SESSION["email"]))
{
    header("Location: auth/login.php");
}

if(!$auth -> check_user($_SESSION["email"], $_SESSION["heslo"]))
{
    header("Location: auth/login.php");
}

$crypt = new Crypt();

// $input = array("Username" => "TomasMacoun", "Password" => "abc", "FirstName" => "Tomas", "LastName" => "Macoun");

// $newUserId = $repo -> create($input);

// var_dump( $repo -> retrieve("Id = 1"));

// $input = array("FirstName" => "Ondrej");
// $podminka = "Id = 1";

// $repo -> update($input, $podminka);

// $input = "Id = 2";

// $res = $repo -> get_items_by_group(1);
// var_dump($res);

echo $crypt -> encrypt("abc");

// $auth -> logout();

?>

