<?php

require_once(__DIR__."/Repository.php");
require_once(__DIR__."/../db/db.php");
require_once(__DIR__."/../model/Group.php");

class GroupRepository extends Repository {
    private const TABLE_NAME = "Groups";

    public function __construct(mysqli $connection)
    {
        parent::__construct($connection, self::TABLE_NAME);
    }

    public function get_groups_by_user(string $userName) : array {
        $sql = $this -> connection -> prepare("SELECT * FROM ".self::TABLE_NAME." WHERE UserId = (SELECT Id FROM Users WHERE UserName = ?) ORDER By CreatedOn DESC");
        $sql -> bind_param("s", $userName);
        $sql -> execute();
        $res = $sql -> get_result();
        $result = array();
        if ($res -> num_rows > 0) {
            while($row = $res -> fetch_assoc()) {
                $output = new Group();
                $output -> Id = $row["Id"];
                $output -> Name = $row["Name"];
                $output -> CreatedOn = $row["CreatedOn"];
                $output -> UpdatedOn = $row["UpdatedOn"];
                $output -> UserId = $row["UserId"];
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