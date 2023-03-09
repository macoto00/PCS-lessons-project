<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="left-side">
        <h1>Sign in</h1>
        <form action="./check_login.php" method="post">
            email:
            <input type="email" name="username"><br><br>
            heslo:
            <input type="password" name="password"><br><br>
            <div>
                <input type="checkbox" name="remember"><span>zapamatovat si me</span><br><br>
            </div>
            <input type="submit" value="Prihlasit se">
        </form>
    </div>
    <div class="right-side"></div>
</body>
</html>