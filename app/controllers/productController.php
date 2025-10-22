<?php

require_once './app/views/productView.php';
require_once './app/models/productModel.php';
require_once './app/views/errorView.php';

class productController {
   private $prodView;
   private $prodModel;
   private $errorView;

   public function __construct(){
      
   $this->prodView = new productView();
   $this->prodModel = new productModel();
   $this->errorView = new errorView();
  }


   public function showProducts(){
      $products = $this->prodModel->getAllProducts();
      $this->prodView->listProducts($products);
   }


   public function showDetails($id){
      $product = $this->prodModel->getProduct($id);
      $this->prodView->showDetails($product);
   }

   public function showProductsByCategory($id){
      $products = $this->prodModel->getproductsByCategory($id);
      $this->prodView->showDetails($products);
   }


   public function addProduct (){
      authHelper::verify();

      if(isset($_POST)){
         $name = $_POST['name'];  
         $category = $_POST['category'];
         $price = $_POST['price'];
         $stock = $_POST['stock'];
     }

     if(empty($name)||empty($category)||empty($price)||empty($stock)){
         $this->errorView->showError("Complete todos los campos");
         return;
     }

     $id = $this->prodModel->addProduct($name, $category, $price, $stock);

     if($id){
         header('Location: ' . BASE_URL . 'products-list');
     } else {
         $this->errorView->showError("Error al insertar el producto");
     }        
    }

   public function deleteProduct($id){
      authHelper::verify();

      $this->prodModel-> deleteProduct($id);
      header('Location: ' . BASE_URL . 'products-list');
   }

   public function updateProduct ($id){
      authHelper::verify();
      if(!empty($_POST['name'])&&!empty($_POST['category'])&&!empty($_POST['price'])){

         $name = $_POST['name'];
         $category = $_POST['category'];
         $price = $_POST['price'];
         $stock = $_POST['stock'];

         $this->prodModel->updateProduct($name, $stock, $price, $category, $id);
         header('Location: ' . BASE_URL . 'products-list');

   }
   }
}