<?php

class Connection{

public $servername = "localhost";
public $username = "root";
public $password = "";

public function connect()
{
    $conn = null;
    try {
        $conn = new PDO("mysql:host=$this->servername;dbname=orm", $this->username, $this->password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    return $conn;
}



}





?>