<?php

class ProductModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Dùng cho trang client
    public function getAll()
    {
        $sql = "SELECT * FROM products";
        $result = $this->db->query($sql);

        return $result;
    }

    // Dùng cho trang admin (kèm tên danh mục)
    public function getAllAdmin()
    {
        $sql = "SELECT products.*, categories.name AS category_name
                FROM products
                JOIN categories ON products.category_id = categories.id
                ORDER BY products.id DESC";
        $result = $this->db->query($sql);

        return $result;
    }

    public function find($id)
    {
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = $this->db->query($sql);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $category_id, $price, $sale_price, $description, $content, $status, $image)
    {
        $sql = "INSERT INTO products (name, category_id, price, sale_price, description, content, status, image)
                VALUES ('$name', $category_id, '$price', '$sale_price', '$description', '$content', '$status', '$image')";

        return $this->db->exec($sql);
    }

    public function update($id, $name, $category_id, $price, $sale_price, $description, $content, $status)
    {
        $sql = "UPDATE products SET
                    name = '$name',
                    category_id = $category_id,
                    price = '$price',
                    sale_price = '$sale_price',
                    description = '$description',
                    content = '$content',
                    status = '$status'
                WHERE id = $id";

        return $this->db->exec($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id = $id";

        return $this->db->exec($sql);
    }
}