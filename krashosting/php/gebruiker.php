<?php
require_once 'config.php';

class gebruiker
{
    private $config;
    private $admin;
    private $id;
    private $mysqli;
    private $loggedin;

    function __construct($userid)
    {
        $this->config = new config();
        $dbinfo = $this->config->getDbconfig();
        $this->mysqli = new mysqli($dbinfo['server'], $dbinfo['username'], $dbinfo['password'], $dbinfo['database']);
        $this->id = $userid;
    }
    function getUserInfo()
    {
        $result = $this->mysqli->query("SELECT rol FROM tabel WHERE id='$this->id'");
        $row = $result->fetch_assoc();
        $this->admin = $row["admin"];
    }

    public function setLoggedIn($state)
    {
        $this->loggedin = $state;
    }

    public function getLoggedIn()
    {
        $this->loggedin = false;
    }
}