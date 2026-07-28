<?php
require_once __DIR__ . '/databaseModel.php';

class categoryModel
{
    private $conn;

    public function __construct()
    {
        $db = new DatabaseModel();
        $this->conn = $db->connect();
    }

    public function getAll()
    {
        try {
            $sql = "SELECT c.*, (SELECT COUNT(*) FROM products p WHERE p.category_id = c.id) AS productCount FROM categories c ORDER BY id DESC";
            $stmt = $this->conn->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Normalize status to 'active'|'hidden' for views
            foreach ($rows as &$r) {
                if (isset($r['status'])) {
                    $r['status'] = (int)$r['status'] === 1 ? 'active' : 'hidden';
                }
            }
            return $rows;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function themMoi($name, $status)
    {
        // Database expects integer status (1=active,0=hidden)
        $statusInt = 1;
        if (is_numeric($status)) {
            $statusInt = (int)$status;
        } else {
            $statusInt = ($status === 'active') ? 1 : 0;
        }

        $sql = "INSERT INTO categories (name, status) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $statusInt]);
    }


}
