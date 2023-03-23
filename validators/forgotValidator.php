<?php
require_once(__DIR__."/loginValidator.php");

class ForgotValidator extends LoginValidator
{
    public function validateForgot(string $email, string $password, string $confirmPassword) : bool
    {
        return parent::validateCredentials($email, $password) &&
                parent::validateCredentials($email, $confirmPassword) &&
                $this -> validateConfirmPassword($password, $confirmPassword);
    }

    private function validateConfirmPassword(string $password, string $confirmPassword) : bool
    {
        return $password === $confirmPassword;
    }
}

?>