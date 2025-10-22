<?php

require_once "./app/controllers/homeController.php";
require_once "./app/controllers/productController.php";
require_once "./app/controllers/adminController.php";
require_once "./app/controllers/categoryController.php";

define ('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

//TABLA DE RUTEO

//home -->                   homeController-->     showHome();
//products-list -->          productController-->  showProducts();
//product-details/:ID->      productController-->  showDetails(id);
//categories-list -->          categoryController-->  showCategories();
//categories-details/:ID->     categoryController-->  showDetailsCat(id);
//login->                    adminController-->    showLogin();
//panel-admin-->             adminController-->    showPanel();
//logout-->                  adminController-->    logout();
//add-product -->            productController-->  addProduct();
//delete-product/:ID -->     productController-->  deleteProduct(id);
//update-product/:ID -->     productController-->  updateProduct(id);
//add-category -->            categoryController-->  addCategory();
//delete-category/:ID -->     categoryController-->  deleteCategory(id);
//update-category/:ID -->     categoryController-->  updateCategory(id);


if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

$params = explode('/', $action);

    switch($params[0]){
        case 'home':
            $controller = new HomeController();
            $controller -> showHome();
            break;
        case 'products-list':
            $controller = new productController();
            $controller->showProducts();
            break;
        case 'product-details':
            $controller = new productController();
            $controller->showDetails($params[1]);
            break;
        case 'categories-list':
            $controller = new categoryController();
            $controller->showCategories();
            break;
        case 'category-details':
            $controller = new categoryController();
            $controller->showDetailsCat($params[1]);
            break;
        case 'login':
            $controller = new adminController();
            $controller ->showLogin();
            break;
        case 'panel-admin':
            $controller = new adminController();
            $controller ->showPanel();
        case 'logout':
            $controller = new adminController();
            $controller ->logout();
        case 'add-product':
            $controller = new productController();
            $controller->addProduct();
            break;
        case 'delete-product':
            $controller = new productController();
            $controller->deleteProduct($params[1]);
            break;
        case 'update-product':
            $controller = new productController();
            $controller->updateProduct($params[1]);
            break;
        case 'add-category':
            $controller = new categoryController();
            $controller->addCategory();
            break;
        case 'delete-category':
            $controller = new categoryController();
            $controller->deleteCategory($params[1]);
            break;
        case 'update-category':
            $controller = new categoryController();
            $controller->updateCategory($params[1]);
            break;

        default: 
            echo "404 Page Not Found";
            break;
    }
?>