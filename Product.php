<?php
include_once('Database.php');

class Product
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->pdo;
    }

    public function getAllProducts()
    {
        $stmt = $this->db->query("SELECT * FROM us");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $description, $price, $picture)
    {
        $stmt = $this->db->prepare("INSERT INTO products (name, description, price, picture) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $description, $price, $picture]);
    }

    public function updateProduct($id, $name, $description, $price, $picture)
    {
        $stmt = $this->db->prepare("UPDATE products SET name = ?, description = ?, price = ?, picture = ? WHERE id = ?");
        return $stmt->execute([$name, $description, $price, $picture, $id]);
    }

    public function deleteProduct($id)
    {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getProductsByPage($limit, $offset)
    {
        $stmt = $this->db->prepare("SELECT * FROM products LIMIT ? OFFSET ?");
        $stmt->bindParam(1, $limit, PDO::PARAM_INT);
        $stmt->bindParam(2, $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}