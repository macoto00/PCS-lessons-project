<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="icon" type="image/x-icon" href="../img/pcslogoshort.svg">
    <title>TODO — New password</title>
</head>
<body>
    <div class="left-side">
        <div class="form-container">
            <h1>New password</h1>
            <form action="update_password.php" method="post" onsubmit="validate(document.getElementsByTagName('form')[0], event);">
                Email <br>
                <input type="email" name="username" id=""><br><br>
                New password <br>
                <input type="password" name="new_password" id=""><br><br>
                Confirm password <br>
                <input type="password" name="confirm_new_password" id=""><br><br>
                <input type="submit" value="Update password" name="update_password">
            </form><br><br>
            <a href="./login.php">Back to login</a>
        </div>
    </div>
    <?php include "../common/rightside.php"; ?>
</body>
<script src="../validators/passwordValidator.js"></script>
<script src="../validators/requiredValidator.js"></script>
<script src="../validators/emailValidator.js"></script>
<script src="../validators/forgotValidator.js"></script>
<script src="../js/forgot.js"></script>
</html>