<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <div class="left-side">
        <h1>Zaregistrovat se</h1>
        <form action="./check_signup.php" method="post">
            email: <input type="email" name="Username"><br><br>
            heslo: <input type="password" name="password"><br><br>
            zopakuj heslo: <input type="password" name="ConfirmPassword"><br><br>
            Jmeno: <input type="text" name="FirstName"><br><br>
            Prijmeni: <input type="text" name="LastName"> <br><br>
            <input type="submit" value="Zaregistrovat se" name="submit">
        </form>
        <a href="./login.php">Zpet na login</a>
    </div>
</body>
</html>