<?php

require_once(__DIR__."/../dal/ItemRepository.php");

if (isset($_POST["operation_type"])) {

    $itemRepo = new ItemRepository($connection);
    $groupRepo = new GroupRepository($connection);
    if ($_POST["operation_type"] == "create") 
    {
        if (isset($_POST["Content"]) && isset($_POST["Done"]) && isset($_POST["CreatedOn"]) && isset($_POST["UpdatedOn"]) && isset($_POST["GroupId"])) 
        {
            $input = array("Content" => $_POST["Content"],
            "Done" => $_POST["Done"],
            "CreatedOn" => $_POST["CreatedOn"],
            "UpdatedOn" => $_POST["UpdatedOn"],
            "GroupId" => $_POST["GroupId"]);
            echo $itemRepo -> create($input);

            $condition = "Id = ".$_POST["Id"];
            $updateInput = array("UpdateOn" => $_POST["CreatedOn"]);
            $groupRepo -> update($updateInput, $condition);
        }
    }

    else if ($_POST["operation_type"] == "update") 
    {
        if (isset($_POST["Id"]) && isset($_POST["UpdatedOn"]) && isset($_POST["Done"]) && isset($_POST["Content"]) && isset($_POST["GroupId"])) 
        {
            $condition = "Id = ".$_POST["Id"];
            $input = array("Content" => $_POST["Content"],
            "Done" => $_POST["Done"],
            "UpdatedOn" => $_POST["UpdatedOn"]);
            $itemRepo -> update($input, $condition);
            $groupCondition = "Id = ".$_POST["GroupId"];
            $groupInput = array("UpdateOn" => $_POST["UpdateOn"]);
            $groupRepo -> update($groupInput, $groupCondition);
        }
    }

    else if ($_POST["operation_type"] == "delete") 
    {
        if (isset($_POST["Id"]) && isset($_POST["Date"]) && isset($_POST["GroupId"]))  
        {
            $deleteCondition = "Id = ".$_POST["Id"];
            $updateCondition = "Id = ".$_POST["GroupId"];
            $updateInput = array("UpdateOn" => $_POST["Date"]);
            $itemRepo -> delete($deleteCondition);
            $groupRepo -> update($updateInput, $updateCondition);
        }
    }
}

?>