<?php
require('../php/pakketten.php');
session_start();
$loggedin = $_SESSION["loggedin"];

if(!$loggedin)
{
    header("Location: ../paginas/krashosting_login.php");
}

if(!isset($_GET) || empty($_GET))
{
    header("Location: krashosting_pakketten.php");
}

$pakketten = new pakketten();
$result = $pakketten->getPakket($_GET["id"]);

$pakket = $result->fetch_assoc();

$id = $pakket["PlanID"];
$name = $pakket["PlanName"];
$description = $pakket["PlanDescription"];
$price = $pakket["PlanPrice"];
$position = $pakket["PlanPosition"];

$price = (float)str_replace("€", "", $price);

$position = (int)$position;

if(isset($_POST) && !empty($_POST))
    $pakketten->editPakket($_POST);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Aanpassen pakketten</title>
        <style>
            form
            {
                width: 300px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                margin: 30px auto 0 auto;
            }
            input, textarea, select
            {
                width: 300px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                margin-top: 10px;
            }
            #prijs
            {
                width: 288px;
            }
            thead tr
            {
                background-color: #F1F1F1;
            }
        </style>
    </head>
    <body>
    <form action="" method="post">
        <input type="text" name="id" hidden value="<?php echo $id?>">
        <input type="text" name="pakketnaam" placeholder="Pakket Naam" value="<?php echo $name?>" required> <br>
        <textarea name="pakketbeschrijving" placeholder="Pakket beschrijving" required><?php echo $description?></textarea> <br>
        € <input type="number" name="pakketprijs" placeholder="Pakket prijs" value="<?php echo $price?>" id="prijs" step=".01"> <br>
        <select name="positie" required>
            <option value="0" <?php if($position === 0) echo "selected"?>>Niet op home</option>
            <option value="1" <?php if($position === 1) echo "selected"?>>Links</option>
            <option value="2" <?php if($position === 2) echo "selected"?>>Midden</option>
            <option value="3" <?php if($position === 3) echo "selected"?>>Rechts</option>
        </select>
        <input type="submit" value="Pas aan" name="submit"> <br>
    </form>
    <script>
        document.getElementById("prijs").addEventListener("change", () => {

            let value = document.getElementById("prijs").value;
//                value = value.replace(",", ".");
            value = parseFloat(value);
            value = Math.round((value + 0.00001) * 100) / 100;
            document.getElementById("prijs").value = value;
        });
    </script>
    </body>
</html>
