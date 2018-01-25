<?php
/**
 * Created by PhpStorm.
 * User: jrapa
 * Date: 9/28/2017
 * Time: 1:41 PM
 */
require_once 'config.php';
//ini_set("display_errors", 1);
//error_reporting(E_ALL);
    
class login
{
    private $config;
    private $loggedin;


    public function __construct($username, $password, $table = "customer")
    {
        $this->config = new config();
        $this->userlogin($username,$password,$table);
    }

    public function userlogin($username, $password, $table)
    {
        if(!preg_match("<script>", $username) && !preg_match("script", $password)) {
            $dbconfig = $this->config->getDbconfig();
            $mysqli = new mysqli($dbconfig  ['server'], $dbconfig  ['username'], $dbconfig  ['password'], $dbconfig ['database']);
            $username = mysqli_real_escape_string($mysqli, $username);
            $password = mysqli_real_escape_string($mysqli, $password);
            $sql = "SELECT Password, FailedLogins FROM " . $table . " WHERE Email='$username'";
            $result = $mysqli->query($sql);

            for($i = 0; $i < $result->num_rows; $i++)
            {
                $row = $result->fetch_assoc();
                if($row["FailedLogins"] >= intval(3))
                {
                    header("Location: ../paginas/krashosting_login.php?failed=true&failedlogins=3");
                }
                else if(password_verify($password, $row['Password']))
                {
                    if($table === "employees")
                    {
                        $this->loggedin = true;
                        $_SESSION["loggedin"] = $this->loggedin;
                        //Locaties moeten nog gemaakt worden
                        header("Location: ../paginas/krashosting_cms.php");
                    }
                    else if($table === "customer")
                    {
                        //Locaties moeten nog gemaakt worden
                        header("Location: google.nl");
                        $this->loggedin = true;
                    }
                }
                else
                {
                    $failedlogins = $row["FailedLogins"];
                    $failedlogins = intval($failedlogins);
                    $failedlogins++;
                    $insertsql = "UPDATE " . $table . " SET FailedLogins = '$failedlogins' WHERE Email='$username'";
                    $mysqli->query($insertsql);
                    header("Location: ../paginas/krashosting_login.php?failed=true");
                }
            }
        }
    }
}
?>
