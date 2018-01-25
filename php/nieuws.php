<?php
require_once 'config.php';


class nieuws
{
    private $config;

    public function __construct()
    {
        $this->config = new config();
    }

    function send_news_message($title,$message)
    {
        $dbconfig = $this->config->getDbconfig();
        $mysqli = new mysqli($dbconfig['server'], $dbconfig['username'], $dbconfig['password'],$dbconfig['database']);
        $sql = "INSERT INTO news(Title,Message) VALUES('$title', '$message')";
        $mysqli->query($sql);
//        echo $mysqli->error;
    }
    function fetch_news_messages()
    {
        $dbconfig = $this->config->getDbconfig();
        $mysqli = new mysqli($dbconfig['server'], $dbconfig['username'], $dbconfig['password'],$dbconfig['database']);
        $sql = "SELECT * FROM news LIMIT 3";
        $result = $mysqli->query($sql);

        while ($data = $result->fetch_assoc())
        {
            $statistic[] = $data;
        }

        return $statistic;

    }
}
