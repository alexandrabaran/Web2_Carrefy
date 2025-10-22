<?php

require_once './app/views/categoryView.php';
require_once './app/models/categoryModel.php';
require_once './app/views/errorView.php';

class categoryController {
   private $catView;
   private $catModel;
   private $errorView;

   public function __construct(){
      
   $this->catView = new categoryView();
   $this->catModel = new categoryModel();
   $this->errorView = new errorView();
  }

   public function showCategories(){
      $categories = $this->catModel->getAllCategories();
      $this->catView->listCategories($categories);
   }

   public function showDetailsCat($id){
      $categories = $this->catModel->getCategory($id);
      $this->catView->showDetailsCat($categories);
   }

   public function addCategory (){
      authHelper::verify();

      if(isset($_POST)){    
         $name = $_POST['name'];  
         $supp = $_POST['supp'];
         $shelve = $_POST['shelve'];
     }

     if(empty($name)||empty($supp)||empty($shelve)){
         $this->errorView->showError("Complete todos los campos");
         return;
     }

     $id = $this->catModel->addCategory ($name, $supp, $shelve);

     if($id){
         header('Location: ' . BASE_URL . 'categories-list');
     } else {
         $this->errorView->showError("Error al insertar el producto");
     }        
    }

   public function deleteCategory($id){
      authHelper::verify();

      $this->catModel-> deleteCategory($id);
      header('Location: ' . BASE_URL . 'categories-list');
   }

   public function updateCategory ($id){
      authHelper::verify();
      if(!empty($_POST['name'])&&!empty($_POST['category'])&&!empty($_POST['price'])){

         $name = $_POST['name'];
         $supp = $_POST['supp'];
         $shelve = $_POST['shelve'];

         $this->catModel->updateCategory($name, $supp, $shelve,$id);
         header('Location: ' . BASE_URL . 'categories-list');
   }
   }
}