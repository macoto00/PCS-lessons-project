<?php

require_once(__DIR__."/../dal/ItemRepository.php");
require_once(__DIR__."/../dal/GroupRepository.php");

if(isset($_POST["operation_type"]))
{
    $itemRepo = new ItemRepository($connection);
    $groupRepo = new GroupRepository($connection);
    if($_POST["operation_type"] == "create")
    {
        if(isset($_POST["Content"]) &&
           isset($_POST["Done"]) &&
           isset($_POST["CreatedOn"]) &&
           isset($_POST["UpdatedOn"]) &&
           isset($_POST["GroupId"]))
        {
            $input = array("Content" => $_POST["Content"],
                           "Done" => $_POST["Done"],
                           "CreatedOn" => $_POST["CreatedOn"],
                           "UpdatedOn" => $_POST["UpdatedOn"],
                           "GroupId" => $_POST["GroupId"]);
            echo $itemRepo -> create($input);

            $groupRepo -> update(array("UpdatedOn" => $_POST["CreatedOn"]), "Id = ".$_POST["GroupId"]);
        }
    }
    else if($_POST["operation_type"] == "update")
    {
        if(isset($_POST["Id"]) && isset($_POST["UpdatedOn"]) && isset($_POST["Done"]) && isset($_POST["Content"]) && isset($_POST["GroupId"]))
        {
            $condition = "Id = ".$_POST["Id"];
            $input = array("Content" => $_POST["Content"],
                           "Done" => $_POST["Done"],
                           "UpdatedOn" => $_POST["UpdatedOn"]);
            $itemRepo -> update($input, $condition);
            $groupRepo -> update(array("UpdatedOn" => $_POST["UpdatedOn"]), "Id = ".$_POST["GroupId"]);
        }
    }
    else if($_POST["operation_type"] == "delete")
    {
        if(isset($_POST["Id"]) && isset($_POST["Date"]) && isset($_POST["GroupId"]))
        {
            $itemRepo -> delete("Id = ".$_POST["Id"]);
            $groupRepo -> update(array("UpdatedOn" => $_POST["Date"]), "Id = ".$_POST["GroupId"]);
        }
    }
}

?>