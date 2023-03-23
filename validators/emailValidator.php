<?php

class EmailValidator
{
    public function validate(string $email) : bool{
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }
}

?>