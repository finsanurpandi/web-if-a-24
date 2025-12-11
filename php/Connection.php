<?php

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'web2024');
define('DB_PORT', '3307');

class Connection
{
    public $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        
        if($this->mysqli->connect_errno)
        {
            echo "Failed to connect Mysqli ".$this->mysqli->connect_error;
        }
    }
}