<?php

class productView{

    public function listProducts($products){
     require './templates/productList.phtml';
    }

    public function showDetails ($products){
     require "./templates/productDetail.phtml";
    }

    public function showFormAdd (){
        require "./templates/addProduct.phtml";
    }

    public function showFormDelete (){
        require "./templates/deleteProduct.phtml";
    }

    public function showFormUpdate (){
        require "./templates/updateProduct.phtml";
    }

}