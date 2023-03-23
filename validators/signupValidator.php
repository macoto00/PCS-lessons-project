<?php
require_once(__DIR__."/loginValidator.php");

class SignUpValidator extends LoginValidator
{
    public function validateSignup(string $name, string $surname, string $email, string $password, string $confirmPassword) : bool{
        return $this -> validateName($name) &&
                $this -> validateName($surname) &&
                parent::validateCredentials($email, $password) &&
                parent::validateCredentials($email, $confirmPassword) &&
                $this -> validateConfirmPassword($password, $confirmPassword);
    }

    private function validateConfirmPassword(string $password, string $confirmPassword) : bool{
        return $password === $confirmPassword;
    }

    private function validateName(string $name) : bool{
        return preg_match('/[a-zA-Z]/', $name);
    }
}

?>