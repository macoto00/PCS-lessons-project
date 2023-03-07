<?php

require_once(__DIR__."/db/db.php");
require_once(__DIR__."/dal/Repository.php");

require_once(__DIR__."/dal/UserRepository.php");

$repo = new UserRepository($connection);

// $input = array("Username" => "TomasMacoun", "Password" => "abc", "FirstName" => "Tomas", "LastName" => "Macoun");

// $newUserId = $repo -> create($input);

// var_dump( $repo -> retrieve("Id = 1"));

// $input = array("FirstName" => "Ondrej");
// $podminka = "Id = 1";

// $repo -> update($input, $podminka);

// $input = "Id = 2";

$res = $repo -> get_user("TomasMacoun");
var_dump($res);

?>