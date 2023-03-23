<?php
    require_once "dal/UserRepository.php";
    
    $repo = new UserRepository($connection);
    $user = $repo -> get_user($_SESSION["email"]);
?>
<div class="header-right-resp" onclick="headerClick(this)">
    <div class="header-right-resp-inner">
        <?php echo $user -> FirstName." ".$user -> LastName;?>
    </div>
    <form action="auth/logout.php" method="post">
        <input type="submit" value="Log out" name="logout">
    </form>
    <form action="auth/delete_account.php" method="post">
        <input type="submit" value="Delete account" name="delete_account">
    </form>
</div>
<nav class="resp-nav">
    <a href="./index.php" <?php if(str_contains($_SERVER["SCRIPT_NAME"], "index.php")) echo "data-this";?>>
        <div class="resp-nav-icon" type="home"></div>
        Home
    </a>
    <a href="./about.php" <?php if(str_contains($_SERVER["SCRIPT_NAME"], "about.php")) echo "data-this";?>>
        <div class="resp-nav-icon" type="about"></div>
        About
    </a>
    <a href="./contacts.php" <?php if(str_contains($_SERVER["SCRIPT_NAME"], "contacts.php")) echo "data-this";?>>
        <div class="resp-nav-icon" type="contacts"></div>
        Contacts
    </a>
    <div onclick="expandAccount(this)">
        <div class="resp-nav-icon" type="account"></div>
        Account
    </div>
</nav>
