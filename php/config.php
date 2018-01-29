<?php

class config
{
    private $dbconfig = array(
        'server' => 'localhost',
        'username' => 'root',
        'password' => 'root',
        'database' => 'krashosting'
    );

    public function getDbconfig()
    {
        return $this->dbconfig;
    }
}