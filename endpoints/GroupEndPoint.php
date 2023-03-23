<?php

require_once(__DIR__."/../dal/GroupRepository.php");

if(isset($_POST["operation_type"]))
{
    $groupRepo = new GroupRepository($connection);
    if($_POST["operation_type"] == "create")
    {
        if(isset($_POST["Name"]) &&
           isset($_POST["CreatedOn"]) &&
           isset($_POST["UpdatedOn"]) &&
           isset($_POST["UserId"]))
        {
            $input = array("Name" => $_POST["Name"],
                           "CreatedOn" => $_POST["CreatedOn"],
                           "UpdatedOn" => $_POST["UpdatedOn"],
                           "UserId" => $_POST["UserId"]);
            echo $groupRepo -> create($input);
        }
    }
    else if($_POST["operation_type"] == "update")
    {
        if(isset($_POST["Id"]) && isset($_POST["UpdatedOn"]) && isset($_POST["Name"]))
        {
            $condition = "Id = ".$_POST["Id"];
            $input = array("Name" => $_POST["Name"],
                           "UpdatedOn" => $_POST["UpdatedOn"]);
            $groupRepo -> update($input, $condition);
        }
    }
    else if($_POST["operation_type"] == "delete")
    {
        if(isset($_POST["Id"]))
        {
            $groupRepo -> delete("Id = ".$_POST["Id"]);
        }
    }
}

?>