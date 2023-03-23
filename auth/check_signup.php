<?php
require_once(__DIR__."/../db/db.php");
require_once(__DIR__."/signer.php");
require_once(__DIR__."/../validators/signupValidator.php");

if(isset($_POST["Submit"]))
{
    $userName = $_POST["UserName"];
    $password = $_POST["Password"];
    $confirmPassword = $_POST["ConfirmPassword"];
    $firstName = $_POST["FirstName"];
    $lastName = $_POST["LastName"];
    if(isset($userName) && isset($password) && isset($confirmPassword) && 
       !empty($userName) && !empty($password) && !empty($confirmPassword) && 
       isset($firstName) && isset($lastName) && 
       !empty($firstName) && !empty($lastName))
    {
        $validator = new SignUpValidator();
        if(!$validator -> validateSignup($firstName, $lastName, $userName, $password, $confirmPassword))
        {
            header("Location: login.php");
        }
        $signer = new Signer($connection);
        $signer -> add_user($userName, $password, $confirmPassword, $firstName, $lastName);
    }
}

header("Location: login.php");

?>