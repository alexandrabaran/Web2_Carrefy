<?php
require_once './app/models/model.php';

class categoryModel extends model{

    public function getAllCategories(){ 
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }

    public function getCategory($id){
        $query = $this->db->prepare('SELECT * FROM categories WHERE category_id = ?');
        $query->execute([$id]);
        $category = $query->fetchAll(PDO::FETCH_OBJ);
        return $category;
    }

    public function addCategory($name, $supp, $shelve){
        $query = $this->db->prepare('INSERT INTO categories (category_name, category_supp, category_shelve) VALUES (?,?,?)');
        $query->execute([$name, $supp, $shelve]);
    }

    public function deleteCategory($id) {
    $query = $this->db->prepare('DELETE FROM categories WHERE category_id = ?');
    $query->execute([$id]);}
 
    public function updateCategory($name, $supp, $shelve, $id){
    $query = $this->db->prepare('UPDATE categories SET category_supp = ? , category_shelve = ? WHERE category_id = ?');
    $query->execute([$name, $supp, $shelve, $id]); 
    }
}