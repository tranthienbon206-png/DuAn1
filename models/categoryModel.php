<?php

class CategoryModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Danh sách danh mục, kèm số sản phẩm mỗi danh mục
    public function getAll()
    {
        $sql = "SELECT c.*, (SELECT COUNT(*) FROM products p WHERE p.category_id = c.id) AS productCount
                FROM categories c
                ORDER BY c.id DESC";
        $stmt = $this->db->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Đổi status số (1/0) sang chữ cho view dễ dùng
        foreach ($rows as &$r) {
            $r['status'] = ((int) $r['status'] === 1) ? 'active' : 'hidden';
        }

        return $rows;
    }

    public function find($id)
    {
        $sql = "SELECT * FROM categories WHERE id = $id";
        $stmt = $this->db->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $row['status'] = ((int) $row['status'] === 1) ? 'active' : 'hidden';
        }

        return $row;
    }

    public function create($name, $status)
    {
        $statusInt = ($status === 'active') ? 1 : 0;

        $sql = "INSERT INTO categories (name, status) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$name, $statusInt]);
    }

    public function update($id, $name, $status)
    {
        $statusInt = ($status === 'active') ? 1 : 0;

        $sql = "UPDATE categories SET name = ?, status = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$name, $statusInt, $id]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM categories WHERE id = $id";

        return $this->db->exec($sql);
    }
}