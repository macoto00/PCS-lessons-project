<?php

require_once(__DIR__."/Repository.php");
require_once(__DIR__."/../db/db.php");
require_once(__DIR__."/../model/Item.php");

class ItemRepository extends Repository {
    private const TABLE_NAME = "Items";

    public function __construct(mysqli $connection)
    {
        parent::__construct($connection, self::TABLE_NAME);
    }

    public function get_items_by_group(int $groupId) : array {
       
            $sql = $this -> connection -> prepare("SELECT * FROM ".self::TABLE_NAME." WHERE GroupId = ?");
            $sql -> bind_param("i", $groupId);
            $sql -> execute();
            $res = $sql -> get_result();
            $result = array();
            if ($res -> num_rows > 0) {
                while($row = $res -> fetch_assoc()) {
                    $output = new Item();
                    $output -> Id = $row["Id"];
                    $output -> Content = $row["Content"];
                    $output -> Done = $row["Done"];
                    $output -> CreatedOn = $row["CreatedOn"];
                    $output -> UpdatedOn = $row["UpdatedOn"];
                    $output -> GroupId = $row["GroupId"];
                    array_push($result, $output);
                }
            }
            else {
                echo "0 results";
            }
            return $result;
        
    }
}

?>