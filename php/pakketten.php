<?php
require 'config.php';

class pakketten
{
    private $dbconfig;
    private $mysqli;

    public function __construct()
    {
        $dbconfig = new config();
        $this->dbconfig = $dbconfig->getDbconfig();
        $this->mysqli = new mysqli($this->dbconfig["server"], $this->dbconfig["username"], $this->dbconfig["password"], $this->dbconfig["database"]);
    }

    public function getPakketten()
    {
        $sql = "SELECT * FROM plans";
        $result = $this->mysqli->query($sql);
        return $result;
    }

    public function getPakket($id)
    {
        $sql = "SELECT * FROM plans WHERE PlanID='$id'";
        $result = $this->mysqli->query($sql);
        return $result;
    }

    public function addPakket($post)
    {
        $pakketnaam = $post["pakketnaam"];
        $pakketbeschrijving = $post["pakketbeschrijving"];
        $pakketprijs = "";
        if(is_numeric($post["pakketprijs"]))
            $pakketprijs = "€ " . $post["pakketprijs"];
        else if(empty($pakketprijs) || !isset($pakketprijs) || $pakketprijs == null || $pakketprijs == 0)
            $pakketprijs = null;
        else
            $pakketprijs = $post["pakketprijs"];

        $positie = $post["positie"];

        if($positie > 0)
        {
            $possql = "UPDATE plans SET PlanPosition=0 WHERE PlanPosition='$positie'";
            $this->mysqli->query($possql);
        }

        if($pakketprijs != null)
            $sql = "INSERT INTO plans (PlanName, PlanDescription, PlanPrice, PlanPosition) VALUES ('$pakketnaam', '$pakketbeschrijving', '$pakketprijs', '$positie')";
        else
            $sql = "INSERT INTO plans (PlanName, PlanDescription, PlanPrice, PlanPosition) VALUES ('$pakketnaam', '$pakketbeschrijving', NULL, '$positie')";
        $this->mysqli->query($sql);

        header("Location: krashosting_pakketten.php");
    }

    public function editPakket($post)
    {
        $id = $post["id"];
        $pakketnaam = $post["pakketnaam"];
        $pakketbeschrijving = $post["pakketbeschrijving"];
        $pakketprijs = "";
        if(is_numeric($post["pakketprijs"]))
            $pakketprijs = "€ " . $post["pakketprijs"];
        else if(empty($pakketprijs) || !isset($pakketprijs) || $pakketprijs == null || $pakketprijs == 0)
            $pakketprijs = null;
        else
            $pakketprijs = $post["pakketprijs"];

        $positie = $post["positie"];
        if($positie > 0)
        {
            $possql = "UPDATE plans SET PlanPosition=0 WHERE PlanPosition='$positie'";
            $this->mysqli->query($possql);
        }

        if($pakketprijs != null)
            $sql = "UPDATE plans SET PlanName='$pakketnaam', PlanDescription='$pakketbeschrijving', PlanPrice='$pakketprijs', PlanPosition='$positie' WHERE PlanID='$id'";
        else
            $sql = "UPDATE plans SET PlanName='$pakketnaam', PlanDescription='$pakketbeschrijving', PlanPrice=NULL, PlanPosition='$positie'  WHERE PlanID='$id'";

        $this->mysqli->query($sql);

        header("Location: krashosting_pakketten.php");
    }

    public function getHomePakketten()
    {
        $sql = "SELECT PlanName, PlanDescription, PlanPrice, PlanPosition FROM plans WHERE PlanPosition = 1 OR PlanPosition = 2 OR PlanPosition = 3";

        return $this->mysqli->query($sql);
    }
}