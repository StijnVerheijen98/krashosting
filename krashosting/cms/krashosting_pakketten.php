<?php
    require '../php/pakketten.php';
    session_start();
    $loggedin = $_SESSION["loggedin"];

    if(!$loggedin)
    {
        header("Location: ../paginas/krashosting_login.php");
    }
    $pakketten = new pakketten();
    $result = $pakketten->getPakketten();
    $tablestring = "";
    while($row = $result->fetch_assoc())
    {
        $prijs = "";
        if($row["PlanPrice"] === null)
            $prijs = "Bespreekbaar";
        else
            $prijs = $row["PlanPrice"];

        $positie = "";
        if($row["PlanPosition"] === null)
            $positie = "Niet op home";
        else
        {
            switch ($row["PlanPosition"])
            {
                case 0:
                    $positie = "Niet op home";
                    break;
                case 1:
                    $positie = "links";
                    break;
                case 2:
                    $positie = "midden";
                    break;
                case 3:
                    $positie = "rechts";
                    break;
            }
        }

        $tablestring .= "<tr><td>" . $row["PlanID"] . "</td><td>" . $row["PlanName"] . "</td><td>" . $row["PlanDescription"] ."</td><td>$prijs</td><td>$positie</td><td><a href='pakketten_aanpassen.php?id=" . $row["PlanID"] . "'>Pas aan</a></td></td></tr>";
    }

    if(isset($_POST["submit"]) && !empty ($_POST["submit"]))
    {
        $pakketten->addPakket($_POST);
    }
?>
<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <title>Pakketten</title>
        <style>
            table
            {
                width: 100%;
                border-collapse: collapse;
            }
            td
            {
                width: 16%;
                text-align: center;
            }
            tr:nth-child(even)
            {
                background-color: #F1F1F1;
            }
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
        <table id="pakketten">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Naam</th>
                    <th>Beschrijving</th>
                    <th>Prijs</th>
                    <th>Positie</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
            <?php echo $tablestring;?>
            </tbody>
        </table>
        <form action="" method="post">
            <input type="text" name="pakketnaam" placeholder="Pakket Naam" required> <br>
            <textarea name="pakketbeschrijving" placeholder="Pakket beschrijving" required></textarea> <br>
            € <input type="number" name="pakketprijs" placeholder="Pakket prijs" id="prijs" step=".01"> <br>
            <select name="positie" required>
                <option value="0" selected>Niet op home</option>
                <option value="1">Links</option>
                <option value="2">Midden</option>
                <option value="3">Rechts</option>
            </select>
            <input type="submit" value="Voeg toe" name="submit"> <br>
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
