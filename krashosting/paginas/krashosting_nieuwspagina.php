<?php
require_once '../php/nieuws.php';
session_start();

$nieuws = new nieuws();
$berichten = $nieuws->fetch_news_messages();

// Nieuwsbericht verzenden (Admin only, later naar cms verplaatsen)
if(isset($_POST))
{
    $titel = $_POST["titel"];
    $bericht = $_POST['bericht'];

    if(isset($titel) && !empty($titel) && isset($bericht) && !empty($bericht))
    {
        $nieuws->send_news_message($titel,$bericht);
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
    <head>
<!--        <link rel="StyleSheet" href="../css/krashosting_default.css" type="text/css">-->
        <meta charset="UTF-8">
        <title>Nieuwspagina</title>
    </head>
    <body>
        <header>Nieuws van vandaag!</header>
        <?php print_r($berichten); ?>
            <nav>
               <li><a href="home.html">Home</a></li>
               <li><a>News</a></li>
               <li><a>Contact</a></li>
            </nav>
            <div>Plek om nieuwsberichten te versturen (voor nu)</div>
                <form action="" method="post">
                    <?php if($_GET["failed"] === "true") echo "<p>Er is iets fout gegaan!</p>"?>
                    <p><input type="text" name="titel" value="" placeholder="Titel"></p>
                    <p><textarea placeholder="Bericht" name="bericht"></textarea></p>
                    <p class="submit"><input type="submit" name="submit" value="Send"></p>
                </form>
            <div id="bericht1">Nieuwsbericht 1</div>
            <div id="bericht2">Nieuwsbericht 2</div>
            <div id="bericht3">Nieuwsbericht 3</div>
        <footer>Navigeer naar de volgende pagina's</footer>
        <?php foreach ($berichten as $ber)
            echo 'Title: ' . $ber['Title'] . " - Bericht: ". $ber['Message'] . " - Datum: ". $ber['Date'] . "<br>" ?>
    </body>
</html>