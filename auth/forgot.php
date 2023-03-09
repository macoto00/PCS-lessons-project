<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zapomenuté heslo</title>
</head>
<body>
    <div class="lest-side">
        <form action="update_password.php" method="post">
            <h1>New password</h1>
            email: <input type="email" name="username">
            heslo: <input type="text" name="password">
            potvrzení hesla: <input type="text" name="confirmPassword">
            <input type="submit" value="Obnovit heslo" name="submit">
        </form>
    </div>
</body>
</html>