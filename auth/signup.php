<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="icon" type="image/x-icon" href="../img/pcslogoshort.svg">
    <title>TODO — Sign up</title>
</head>
<body>
<div class="left-side">
    <div class="form-container">
        <h1>Sign up</h1>
        <form action="./check_signup.php" method="post" onsubmit="validate(this, event);">
            Email <br>
            <input type="email" name="UserName"><br><br>
            Password <br>
            <input type="password" name="Password"><br><br>
            Confirm password <br>
            <input type="password" name="ConfirmPassword"><br><br>
            First name <br>
            <input type="text" name="FirstName"><br><br>
            Last name <br>
            <input type="text" name="LastName"><br><br>
            <input type="submit" value="Sign up" name="Submit">
        </form><br><br>
        <a href="./login.php">Back to login</a>
    </div>
</div>
<?php include "../common/rightside.php"; ?>
</body>
<script src="../validators/passwordValidator.js"></script>
<script src="../validators/requiredValidator.js"></script>
<script src="../validators/emailValidator.js"></script>
<script src="../validators/signupValidator.js"></script>
<script src="../js/signup.js"></script>
</html>