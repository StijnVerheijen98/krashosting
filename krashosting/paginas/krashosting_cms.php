<?php
//require_once '../php/gebruiker.php';
session_start();
$loggedin = $_SESSION["loggedin"];

if(!$loggedin)
{
    header("Location: krashosting_login.php");
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CMS</title>
    </head>
    <body>
        Ingelogd! <br>
        <a href="../cms/krashosting_pakketten.php">Pakketten</a>
        <a href="krashosting_login.php?logout=true">Logout</a>
    </body>
</html>
