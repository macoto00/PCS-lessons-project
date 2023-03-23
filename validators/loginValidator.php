<?php
require_once(__DIR__."/emailValidator.php");
require_once(__DIR__."/passwordValidator.php");

class LoginValidator{
    private EmailValidator $emailValidator;
    private PasswordValidator $passwordValidator;

    public function __construct()
    {
        $this -> emailValidator = new EmailValidator();
        $this -> passwordValidator = new PasswordValidator();
    }

    public function validateCredentials(string $email, string $password) : bool
    {
        return
            $this -> emailValidator -> validate($email) &&
            $this -> passwordValidator -> validate($password);
    }
}

?>