<?php

require_once(__DIR__."/db/db.php");
require_once(__DIR__."/dal/ItemRepository.php");

$repo = new ItemRepository($connection);

// $input = array("Username" => "TomasMacoun", "Password" => "abc", "FirstName" => "Tomas", "LastName" => "Macoun");

// $newUserId = $repo -> create($input);

// var_dump( $repo -> retrieve("Id = 1"));

// $input = array("FirstName" => "Ondrej");
// $podminka = "Id = 1";

// $repo -> update($input, $podminka);

// $input = "Id = 2";

$res = $repo -> get_items_by_group(1);
var_dump($res);

?>