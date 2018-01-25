<?php
/**
 * Created by PhpStorm.
 * User: jrapa
 * Date: 9/28/2017
 * Time: 2:00 PM
 */

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