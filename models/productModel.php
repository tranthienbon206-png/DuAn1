<?php

class ProductModel{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getAll() {
        $sql = "SELECT * FROM products";
        $result = $this->db->query($sql);

        return $result;
    }
    public function getAllAdmin() {
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $result = $this->db->query($sql);

        return $result;
    }
}