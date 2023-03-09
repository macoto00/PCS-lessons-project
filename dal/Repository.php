<?php

require_once(__DIR__."/IRepository.php");

class Repository implements IRepository {

    protected mysqli $connection;
    private string $tableName;

    public function __construct(mysqli $conn, string $tbName)
    {
        $this -> tableName = $tbName;
        $this -> connection = $conn;

        if ($this -> connection -> connect_error) {
            die("Připojení selhalo: ".$this -> connection -> connect_error);
        }
    }

    public function create(array $fieldsAndValues) : int 
    {
        $sql = "INSERT INTO ".$this -> tableName."(".implode(',', array_keys($fieldsAndValues)).")VALUES('".implode('\',\'', array_values($fieldsAndValues))."');"; 
        $sql = self::prepare_query($sql);

        if (!self::run_query($sql)) {
            throw new Exception("Přidání nové položky selhalo!");
        }
        return $this -> connection -> insert_id;

    }

    public function retrieve(string $condition = null) : array 
    {
        $sql = "SELECT * FROM ".$this -> tableName;
        if ($condition != null) {
            $sql .= " WHERE $condition";
        }

        $result = self::run_query($sql);
        $rows = $result -> fetch_all(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function update(array $fieldsAndValuesToUpdate, string $condition) : void 
    {
        $sql = "UPDATE ".$this -> tableName." SET";
        $sets = array();
        foreach ($fieldsAndValuesToUpdate as $key => $value) {
            array_push($sets, "$key = '$value'");
        }
        $sql .= implode(",", $sets)." WHERE $condition;";
        $sql = self::prepare_query($sql);
        echo $sql;
        if(!self::run_query($sql)){
            throw new Exception("Aktualizace stavajici polozky selhalo!");
        }
        return;
    }

    public function delete(string $condition) : void 
    {
        $sql = "DELETE FROM ".$this -> tableName." WHERE $condition;";
        if (!self::run_query($sql)) {
            throw new Exception("Aktualizace stavajici polozky selhalo!");
        }
        return;
    }

    private function prepare_query(string $sql) : string
    {
        $sql = str_replace("'false'", "false", $sql);
        $sql = str_replace("'true'", "true", $sql);
        $sql = str_replace("'NULL'", "NULL", $sql);
        $sql = str_replace("'null'", "null", $sql);
        return $sql;
    }

    private function run_query(string $sql)
    {
        return $this -> connection -> query($sql);
    }
}

?>