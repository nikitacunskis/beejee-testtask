<?php

namespace Beejee;

class Database
{
    public $conn;

    public function __construct()
    {
        include "app/config.php";
        $this->conn = new \mysqli($host, $user, $pass, $database);
    }
}