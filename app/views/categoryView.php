<?php

class categoryView{

    public function listCategories($categories){
     require './templates/categoryList.phtml';
    }

    public function showDetailsCat ($categories){
     require "./templates/categoryDetail.phtml";
    }

    public function showFormAddCat (){
        require "./templates/addCategory.phtml";
    }

    public function showFormDeleteCat (){
        require "./templates/deleteCategory.phtml";
    }

    public function showFormUpdateCat (){
        require "./templates/updateCategory.phtml";
    }

}