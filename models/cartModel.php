<?php

class CartModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll($user_id) {
        $query = "SELECT * FROM cart WHERE user_id = ?";
        $stmt = $this->db->prepare($query);

        $stmt->execute([$user_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}