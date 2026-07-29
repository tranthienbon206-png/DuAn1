<?php

class ProductModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Dùng cho trang client (không lọc)
    public function getAll()
    {
        $sql = "SELECT * FROM products";
        $result = $this->db->query($sql);

        return $result;
    }

    // Dùng cho trang client - danh sách sản phẩm có lọc theo danh mục + khoảng giá
    public function getFiltered($categoryId = null, $priceRanges = [])
    {
        $sql = "SELECT p.*, c.name AS category_name
                FROM products p
                JOIN categories c ON p.category_id = c.id
                WHERE 1=1";
        $params = [];

        if (!empty($categoryId)) {
            $sql .= " AND p.category_id = ?";
            $params[] = $categoryId;
        }

        if (!empty($priceRanges)) {
            $priceConditions = [];

            foreach ($priceRanges as $range) {
                if ($range === 'under_200') {
                    $priceConditions[] = "p.price < 200000";
                } elseif ($range === '200_500') {
                    $priceConditions[] = "p.price BETWEEN 200000 AND 500000";
                } elseif ($range === 'over_500') {
                    $priceConditions[] = "p.price > 500000";
                }
            }

            if (!empty($priceConditions)) {
                $sql .= " AND (" . implode(' OR ', $priceConditions) . ")";
            }
        }

        $sql .= " ORDER BY p.id DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);

        return $stmt;
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

    // Dùng cho trang chi tiết sản phẩm (kèm tên danh mục cho breadcrumb)
    public function findDetail($id)
    {
        $sql = "SELECT p.*, c.name AS category_name
                FROM products p
                JOIN categories c ON p.category_id = c.id
                WHERE p.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Sản phẩm liên quan: cùng danh mục, loại trừ chính nó
    public function getRelated($categoryId, $excludeId, $limit = 4)
    {
        $sql = "SELECT * FROM products
                WHERE category_id = :categoryId AND id != :excludeId
                ORDER BY id DESC
                LIMIT :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
        $stmt->bindValue(':excludeId', $excludeId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $category_id, $price, $sale_price, $description, $content, $status, $image)
    {
        $sql = "INSERT INTO products (name, category_id, price, sale_price, description, content, status, image)
                VALUES ('$name', $category_id, '$price', '$sale_price', '$description', '$content', '$status', '$image')";

        return $this->db->exec($sql);
    }

    public function update($id, $name, $category_id, $price, $sale_price, $description, $content, $status, $image)
    {
        $sql = "UPDATE products SET
                name = '$name',
                category_id = $category_id,
                price = '$price',
                sale_price = '$sale_price',
                description = '$description',
                content = '$content',
                status = '$status',
                image = '$image'
            WHERE id = $id";

        return $this->db->exec($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id = $id";

        return $this->db->exec($sql);
    }
}