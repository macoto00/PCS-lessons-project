<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="icon" type="image/x-icon" href="../img/pcslogoshort.svg">
    <title>TODO — Sign in</title>
</head>
<body>
    <div class="left-side">
        <div class="form-container">
            <h1>Sign in</h1>
            <form action="./check_login.php" method="post" onsubmit="validate(document.getElementsByTagName('form')[0], event);">
                Email <br>
                <input type="email" name="username"><br><br>
                Password <br>
                <input type="password" name="password"><br><br>
                <div class="remember">
                    <input type="checkbox" name="remember" value="1" id="remember"> <label for="remember">Remember me</label><br><br>
                </div>
                <input type="submit" value="Sign in" name="submit">
            </form><br>
            <a href="./signup.php">Sign up</a><br><br>
            <a href="./forgot.php">Forgot password?</a>
        </div>
    </div>
    <?php include "../common/rightside.php"; ?>
</body>
<script src="../validators/passwordValidator.js"></script>
<script src="../validators/requiredValidator.js"></script>
<script src="../validators/emailValidator.js"></script>
<script src="../validators/loginValidator.js"></script>
<script src="../js/login.js"></script>

</html>