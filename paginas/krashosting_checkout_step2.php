<?php
require_once '../php/login.php';
session_start();

//ini_set("display_errors", 1);
//error_reporting(E_ALL);

if(isset($_GET['loggedin'])) {
    if(isset($_SESSION['login']) && $_SESSION['login']->check_logged_in()) {
        $klant_info = $_SESSION['login']->getUserinfo();
    }

    else {
        echo 'Er is iets fout gegaan, <a href="krashosting_login.php">klik hier om opnieuw in te loggen</a>';
        return;
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Krashost klant formulier</title>
</head>
<style>
    #kop {
        font-family: arial;
        font-size: 18px;
    }
</style>
<body>
<div class="login">
    <h1 id="kop">Gegevens</h1>

    <form action="" method="post">
        <p>Email: <input type="text" name="email" value="<?= $klant_info[0]['email']?? ''?>" placeholder="E-mail"></p>
        <p>Voornaam: <input type="text" name="vnaam" value="<?= $klant_info[0]['voornaam']?? ''?>" placeholder="Voornaam"></p>
        <p>Achternaam: <input type="text" name="anaam" value="<?= $klant_info[0]['achternaam'] ?? '' ?>" placeholder="Achternaam"></p>

        <p><input type="button" name="cancel" value="Annuleren"><input type="submit" name="submit" value="Verder"></p>
    </form>
</div>
</body>
</html>