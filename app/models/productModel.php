<?php
require_once './app/models/model.php';

class productModel extends model{

    public function getAllProducts(){ 
        $query = $this->db->prepare('SELECT products.*, categories.category_name as category_name FROM products JOIN categories ON categories.category_id = products.category_id');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    public function getProduct($id){
        $query = $this->db->prepare('SELECT products.*, categories.category_name as category_name FROM products JOIN categories ON categories.category_id = products.category_id  WHERE product_id = ?');
        $query->execute([$id]);
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

     public function getproductsByCategory($id) {
    $query = $this->db->prepare('SELECT p.*, c.category_name, c.category_supp, c.category_shelve FROM products p JOIN categories c ON c.category_id = p.category_id WHERE c.category_id = ?');
        $query->execute([$id]);
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    public function addProduct($name, $category, $price, $quantity){
        $query = $this->db->prepare('INSERT INTO products (product_name, category_id, product_price, product_stock) VALUES (?,?,?,?)');
        $query->execute([$name, $category, $price, $quantity]);
    }

    public function deleteProduct($id){
        $query = $this->db->prepare('DELETE FROM products WHERE product_id = ?');
        $query->execute([$id]);
    }
 
    public function updateProduct($name, $quantity, $price, $category, $id){
        $query = $this->db->prepare('UPDATE products SET product_name = ? , product_stock = ? , product_price = ? , category_id = ? WHERE product_id = ?');
        $query->execute([$name, $quantity, $price, $category, $id]);
        
    }
}