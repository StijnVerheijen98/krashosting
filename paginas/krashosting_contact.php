<!doctype>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Contact</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/krashosting.css">
</head>
    <body>
        <header>
            <img class="bannerfoto" src="../images/banner+logo.jpg">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="krashosting_pakketten.php">Pakketten</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="krashosting_overons.php">Over ons</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="krashosting_nieuws.php">Nieuws</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="krashosting_contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <section class="contactform">
            <div class="ctekst">
                <p>Heeft u een vraag of wilt u meer informatie over de pakketten? Neem dan contact met ons op</p>
                <ul>
                    <li>Tel 0135858585</li>
                    <li>Schoolstraat 5 Tilburg</li>
                    <li>E-mail Krashosting@gmail.com</li>
                </ul>
            </div>
            <form class="emailform" method="post" action="../index.php">
                <label for="fname">Voornaam</label>
                <input type="text" id="fname" name="firstname" placeholder="voornaam"><br>
                <label for="lname">Achternaam</label>
                <input type="text" id="lname" name="lastname" placeholder="Achternaam"><br>
                <label for="mail">E-mail adres</label>
                <input type="text" id="mail" name="email" placeholder="email"><br>
                <label for="subject">Bericht</label>
                <textarea id="subject" name="subject" placeholder="Schrijf hier je probleem/advies" style="height:200px; width:300px;"></textarea><br>
                <input type="submit" value="Submit">
            </form>
            <div id="googlemap"></div>
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
<script>
    function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(51.508742,-0.120850),
            zoom:5,
        };
        var map=new google.maps.Map(document.getElementById("googlemap"),mapProp);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvVwGKUvk55v0kdomCJDeEotaOKFN1ywI&callback=myMap"></script>
</html>
