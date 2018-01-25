<?php
require_once '../php/login.php';
session_start();

if(isset($_POST) && !empty($_POST))
{
    $username = $_POST['login'];
    $password = $_POST['password'];

    if(isset($username) && !empty($username) && isset($password) && !empty($password))
    {
        $_SESSION["login"] = new login($username, $password, "employees");
    }
}

if($_GET["logout"] == "true")
{
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Krashost login</title>
</head>
    <style>
        #kop {
            font-family: arial;
            font-size: 18px;
        } 
    </style>
<body>
        <div class="login">
            <h1 id="kop">Login</h1>
            <form action="" method="post">
                <?php
                    if(isset($_GET) && !empty($_GET))
                    {
                        if($_GET["failedlogins"] === "3")
                        {
                            echo '<p style="color: red">U heeft te vaak foutieve login gegevens ingevoerd, neem contact op met uw systeembeheerder!</p>';
                        }
                    }
                    ?>
                <?php if(!empty($_GET["failed"]) && $_GET["failed"] == "true") echo "<p style='color: red'>Je gebruikersnaam of wachtwoord klopt niet!</p>"?>

                <p><input type="text" name="login" value="" placeholder="Emailadres"></p>
                <p><input type="password" name="password" value="" placeholder="Wachtwoord"></p>
                <p class="submit"><input type="submit" name="submit" value="Login"></p>
            </form>
        </div>
</body>
</html>