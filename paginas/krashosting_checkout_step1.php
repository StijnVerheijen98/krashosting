<?php
/**
 * Created by PhpStorm.
 * User: Michel
 * Date: 7-12-2017
 * Time: 13:40
 */

require_once '../php/login.php';
session_start();


?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Krashost login</title>
</head>
<style>
    h1 {
        font-family: arial;
        font-size: 18px;
    }
    h2 {
        font-family: arial;
        font-size: 16px;
    }
    a{

    }
</style>
<body>
<div class="login">
    <h1 id="kop">Bestellen</h1>
    <p>Gemakkelijk bestellen</p>
    <hr>
    <h2>Bestaande klanten</h2>
    <?php
    if( isset($_SESSION["login"]) && $_SESSION["login"]->check_logged_in()) {
        echo "<a href='krashosting_checkout_step2.php?loggedin'>Checkout met dit account</a> of <br> <a href='krashosting_login.php'>Log in met een ander account</a>";
    }
    else {
        echo "<a href='krashosting_login.php'>Inloggen</a>";
    }
    ?>
    <hr>
    <h2>Nieuwe klanten</h2>
    <a href='krashosting_checkout_step2.php'>Checkout als nieuwe klant</a>
</div>
</body>
</html>