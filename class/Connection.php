<?php

class Connection
{
    public static function conn()
    {
        $hostname  = "localhost";
        $username = "root";
        $password = "root";
        $database = "schools";
        $port = '3306';

        // Create connection
        $conn = new mysqli($hostname, $username, $password, $database, $port);

        // Check connection
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}
