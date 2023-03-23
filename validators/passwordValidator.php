<?php

class PasswordValidator{
    public function validate(string $password) : bool{
        if(strlen($password) < 16 || strlen($password) >= 100)
        {
            return false;
        }
        if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password))
        {
            return false;
        }
        if (!preg_match('~[0-9]+~', $password)) {
            return false;
        }
        if(!preg_match('/[A-Z]/', $password)){
            return false;
        }
        return true;
    }
}

?>