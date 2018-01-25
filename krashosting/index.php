<?php
require ('php/pakketten.php');

$pakketten = new pakketten();
$result = $pakketten->getHomePakketten();

$pakketlinksnaam = '';
$pakketlinksbeschrijving = '';
$pakketlinksprijs = '';

$pakketmiddennaam = '';
$pakketmiddenbeschrijving = '';
$pakketmiddenprijs = '';

$pakketrechtsnaam = '';
$pakketrechtsbeschrijving = '';
$pakketrechtsprijs = '';



for($i = 0; $i < $result->num_rows; $i++)
{
    $row = $result->fetch_assoc();
    if($row['PlanPosition'] == 1)
    {
        $pakketlinksnaam = $row['PlanName'];
        $pakketlinksbeschrijving = $row["PlanDescription"];
        if($row["PlanPrice"] == null)
            $pakketlinksprijs = "Bespreekbaar";
        else
        $pakketlinksprijs = $row["PlanPrice"];
    }
    else if($row['PlanPosition'] == 2)
    {
        $pakketmiddennaam = $row['PlanName'];
        $pakketmiddenbeschrijving = $row["PlanDescription"];
        if($row["PlanPrice"] == null)
            $pakketmiddenprijs = "Bespreekbaar";
        else
            $pakketmiddenprijs = $row["PlanPrice"];
    }
    else if($row['PlanPosition'] == 3)
    {
        $pakketrechtsnaam = $row['PlanName'];
        $pakketrechtsbeschrijving = $row["PlanDescription"];
        if($row["PlanPrice"] == null)
            $pakketrechtsprijs = "Bespreekbaar";
        else
            $pakketrechtsprijs = $row["PlanPrice"];
    }
}
?>
<!doctype>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Krashosting</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" href="krashosting.css">
</head>
    <body>
        <header>
            <img class="bannerfoto" src="Images/banner+logo.jpg">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="krashosting_home.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="krashosting_pakketten.html">Pakketten</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="krashosting_overons.html">Over ons</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="krashosting_nieuws.html">Nieuws</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="krashosting_contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <section class="nieuwszijkant">
            <ul class="nieuwsberichtzijkant">
                <li>Zie nieuwsbericht 1</li>
                <p class="nieuwstekst">Ontdek hier wat er vorige week gebeurde bij Krashosting!</p>
                <li>Zie nieuwsbericht 2</li>
                <p class="nieuwstekst">Het laatste nieuws over Krashosting</p>
            </ul>
        </section>
        <section class="intro">
            <h1 class="display-4">Welkom bij Krashosting</h1>
            <p>Wij bieden voordelige pakketten aan voor uw eigen website! </p>
        </section>
        <section class="pakketten">
            <article class="col-3 pakket">
                <h1><?php echo $pakketlinksnaam ?></h1>
                <p><?php echo $pakketlinksbeschrijving ?></p>
                <p><?php echo $pakketlinksprijs ?></p>
            </article>
            <article class="col-3 pakket">
                <h1><?php echo $pakketmiddennaam ?></h1>
                <p><?php echo $pakketmiddenbeschrijving ?></p>
                <p><?php echo $pakketmiddenprijs ?></p>
            </article>
            <article class="col-3 pakket">
                <h1><?php echo $pakketrechtsnaam ?></h1>
                <p><?php echo $pakketrechtsbeschrijving ?></p>
                <p><?php echo $pakketrechtsprijs ?></p>
            </article>
        </section>
        <footer class="footer">
            <h1 class="contact-kop">Neem contact met ons op!</h1>
            <ul>
                <li>Schoolstraat 5</li>
                <li>Krashosting@gmail.com</li>
                <li>0135858585</li>
            </ul>
        </footer>

    </body>
</html>