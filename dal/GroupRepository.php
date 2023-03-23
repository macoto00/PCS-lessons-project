<?php

require_once(__DIR__."/Repository.php");
require_once(__DIR__."/../db/db.php");
require_once(__DIR__."/../model/group.php");

class GroupRepository extends Repository
{
    private const TABLE_NAME = "GROUPS";
    public function __construct(mysqli $connection)
    {
        parent::__construct($connection, self::TABLE_NAME);
    }

    public function get_groups_by_user(string $userName) : array
    {
        $sqlSelect = $this -> connection -> prepare("Select * FROM ".self::TABLE_NAME." WHERE UserId = (SELECT Id FROM USERS WHERE UserName = ?) ORDER BY CreatedOn DESC");
        $sqlSelect -> bind_param("s", $userName); 
        $sqlSelect -> execute();
        $res = $sqlSelect -> get_result();
        $result = array();
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $output = new Group();
                $output -> Id = $row["Id"];
                $output -> Name = $row["Name"];
                $output -> CreatedOn = $row["CreatedOn"];
                $output -> UpdatedOn = $row["UpdatedOn"];
                $output -> UserId = $row["UserId"];
                array_push($result, $output);
            }
        } else {
            echo "0 results";
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