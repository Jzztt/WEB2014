<?php

require_once './includes/db_connect.php';

class Product
{
    private $db;

    public function __construct()
    {
        $this->db = getDBConnection();
    }

    public function getAllProducts()
    {
        $stmt = $this->db->query("SELECT products.*, categories.name as category_name FROM products JOIN categories ON products.categoryId = categories.categoryId");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE productId = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $description, $price, $image, $categoryId)
    {
        $stmt = $this->db->prepare("INSERT INTO products (name, description, price, image, categoryId) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $description, $price, $image, $categoryId]);
        header('Location: ?action=index');
    }

    public function updateProduct($id, $name, $description, $price, $image, $categoryId)
    {
        if (!empty($image)) {
            $stmt = $this->db->prepare("UPDATE products SET name = ?, description = ?, price = ?,image = ?, categoryId = ? WHERE productId  = ?");
            $stmt->execute([$name, $description, $price, $image, $categoryId, $id]);
            return header('Location: ?action=index');
        } else {
            $stmt = $this->db->prepare("UPDATE products SET name = ?, description = ?, price = ?, categoryId = ? WHERE productId  = ?");
            return header('Location: ?action=index');
        }
    }

    public function deleteProduct($id)
    {
        $stmt = $this->db->prepare("DELETE FROM products WHERE productId = ?");
        $stmt->execute([$id]);
        return header('Location: ?action=index');
    }

    public function getAllCategories()
    {
        $stmt = $this->db->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}