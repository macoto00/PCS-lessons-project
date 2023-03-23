<?php
session_start();

require "auth/check_cookie.php";
require "auth/auth.php";
require "db/db.php";
require "dal/GroupRepository.php";
require "dal/ItemRepository.php";

$auth = new Auth($connection);

if(!isset($_SESSION["email"]))
{
    header("Location: auth/login.php");
}

if(!$auth -> check_user($_SESSION["email"], $_SESSION["heslo"]))
{
    header("Location: auth/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/auth.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/about.css">
    <?php include "./common/favicon.php"; ?>
    <title>TODO — About</title>
</head>
<body>
    <?php include "./common/header.php"?>
    
    <div class="block">
        <div class="block">
            <img src="./img/pcslogo.svg" alt="" srcset="" class="intro-logo">
        </div>
        <h1>PROČ UČÍME PROGRAMOVÁNÍ?</h1>
        <p>Naším hlavním cílem je pomoci lidem, kteří chtějí změnit svou kariéru a hledají zaměstnání v technologickém sektoru.</p>
        <p>V Praha Coding School nabízíme kurzy, které byly speciálně navrženy s ohledem na český pracovní trh. Každý kurz je veden profesionálem z oboru, který sdílí své zkušenosti z první ruky a z praxe.</p>
        <p>Kromě toho, že nabízíme řadu špičkových kurzů, poskytujeme absolventům také přístup do kariérního centra, které jim pomůže připravit se na cestu k nové profesi.</p>
    </div>
    <br><br>
    <div class="block">
        <img src="./img/logo.svg" alt="" srcset="" class="intro-logo-small">
    </div>
    <div class="block">
        <p>Daná webová aplikace je ukazkou závěrečného projektu pro Praha Coding School.</p>
        <p>Obsahuje všechny vyučované technologie a má za cíl přípravit studenty k úspěšnému ukončení kurzu WEB DEVELOPMENT a k nástupu do pracovní pozice.</p>
        <p>Praha Coding School uschovává veškerá práva na tuto aplikaci. Komerční a jakékoli další využití této webové aplikace nebo jejích částí bez písemného povolení oprávněného zástupce Praha Coding School se trestá podle zákona č. 121/2000 Sb.</p>
    </div>
    <?php include "./common/footer.php"; ?>
    <?php include "./common/responsive_nav.php"; ?>
</body>
<script src="js/script.js"></script>
</html>