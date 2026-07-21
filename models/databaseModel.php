<?php

class DatabaseModel {
    private $host = "localhost";
    private $username = "root";
    private $password = "mysql";
    private $database = "shop_db";

    public function connect() {
        try {
            $db = new PDO(
                "mysql:host={$this->host};dbname={$this->database};charset=utf8",
                $this->username,
                $this->password
            );

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;

        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}