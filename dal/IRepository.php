<?php

interface IRepository {
    public function create(array $fieldAndValues) : int ;
    public function retrieve(string $condition = null) : array;
    public function update(array $fieldsAndValuesToUpdate, string $condition) : void;
    public function delete(string $condition) : void;
}

?>