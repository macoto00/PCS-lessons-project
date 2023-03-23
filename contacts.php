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
    <link rel="stylesheet" href="./css/contact.css">
    <?php include "./common/favicon.php"; ?>
    <title>TODO — Contacts</title>
</head>
<body>
    <?php include "./common/header.php"?>
    <div class="block">
        <div class="block-picture" type="autor"></div>
        <div class="block-info">
            <h1 class="block-header">Alexey Pankratov</h1>
            <div class="block-subtitle">Autor</div><br>
            Information technology lecturer <br>@ <strong>Praha CODING School</strong>
            <div class="block-links">
                <a href="mailto:alexey.prahacodingschool@gmail.com"><div class="email"></div></a>
                <a href="tel:+420 776 499 773"><div class="tel"></div></a>
                <a href="https://www.linkedin.com/in/alexeypankratov/"  target="_blank"><div class="lin"></div></a>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="block-picture" type="school"></div>
        <div class="block-info">
            <h1 class="block-header">Praha Coding School</h1>
            <div class="block-links">
                <a href="mailto:info@prahacoding.cz"><div class="email"></div></a>
                <a href="tel:+420 704 217 460"><div class="tel"></div></a>
                <a href="https://www.prahacoding.cz" target="_blank"><div class="web"></div></a>
            </div>
        </div>
    </div>
    <?php include "./common/footer.php"; ?>
    <?php include "./common/responsive_nav.php"; ?>
</body>
<script src="js/script.js"></script>
</html>