<?php

require_once(__DIR__."/db/db.php");
require_once(__DIR__."/dal/Repository.php");

require_once(__DIR__."/dal/Repository.php");

$repo = new Repository($connection, "Users");

// $input = array("Username" => "TomasMacoun", "Password" => "abc", "FirstName" => "Tomas", "LastName" => "Macoun");

// $newUserId = $repo -> create($input);

// var_dump( $repo -> retrieve("Id = 1"));

// $input = array("FirstName" => "Ondrej");
// $podminka = "Id = 1";

// $repo -> update($input, $podminka);

// $input = "Id = 2";



?>