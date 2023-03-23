<?php

require_once(__DIR__."/Repository.php");
require_once(__DIR__."/../db/db.php");
require_once(__DIR__."/../model/item.php");

class ItemRepository extends Repository
{
    private const TABLE_NAME = "ITEMS";
    public function __construct(mysqli $connection)
    {
        parent::__construct($connection, self::TABLE_NAME);
    }

    public function get_items_by_group(int $groupId) : array
    {
        $sqlSelect = $this -> connection -> prepare("Select * FROM ".self::TABLE_NAME." WHERE GroupId = ?");
        $sqlSelect -> bind_param("i", $groupId); 
        $sqlSelect -> execute();
        $res = $sqlSelect -> get_result();
        $result = array();
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
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
        
        return $result;
    }

    private function run_query($sql)
    {
        $result = $this -> connection -> query($sql);
        $rows = $result -> fetch_all(PDO::FETCH_ASSOC);
        return $rows;
    }
}

?>