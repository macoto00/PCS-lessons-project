<?php
    require_once "dal/UserRepository.php";
    
    $repo = new UserRepository($connection);
    $user = $repo -> get_user($_SESSION["email"]);
?>
<header>
    <div class="header-left">
        <a href="./index.php"><div class="logo"></div></a>
        <nav>
            <a href="./index.php" <?php if(str_contains($_SERVER["SCRIPT_NAME"], "index.php")) echo "data-this";?>>Home</a>
            <a href="./about.php" <?php if(str_contains($_SERVER["SCRIPT_NAME"], "about.php")) echo "data-this";?>>About</a>
            <a href="./contacts.php" <?php if(str_contains($_SERVER["SCRIPT_NAME"], "contacts.php")) echo "data-this";?>>Contacts</a>
        </nav>
    </div>
    <div class="header-right" data-open="0" onclick="headerClick(this)">
        <?php echo $user -> FirstName." ".$user -> LastName;?>
        <form action="auth/logout.php" method="post">
            <input type="submit" value="Log out" name="logout">
        </form>
        <form action="auth/delete_account.php" method="post">
            <input type="submit" value="Delete account" name="delete_account">
        </form>
    </div>
</header>

<script src="js/header.js"></script>
