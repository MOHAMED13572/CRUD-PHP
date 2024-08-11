<?php

class Dbh
{

    public function connect()
    {

        try {
            $hostname = 'localhost';
            $dbname = 'cruds';
            $username = 'root';
            $pwd = '';

            $dsn = 'mysql:host=' . $hostname . ';dbname=' . $dbname;
            $dbh = new PDO($dsn, $username, $pwd);
            return $dbh;
        } catch (PDOException $e) {
            echo 'Connection Error: '. $e->getMessage();
            die();
        }
    }
}
