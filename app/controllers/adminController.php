<?php

require_once './app/models/adminModel.php';
require_once './app/views/adminView.php';
require_once './app/helpers/authHelper.php';
require_once './app/views/errorView.php';

class adminController {

    private $model;
    private $view;
    private $errorView;

    public function __construct(){
        $this->model = new adminModel();
        $this->view = new adminView();
        $this->errorView = new errorView();
    }

    public function showLogin(){
            $this->view->showLoginForm();
    }

    public function login(){
        $user = $_POST['user'];
        $password = $_POST['password'];
    
        if(empty($user)||empty($password)){
            $this->errorView->showError('Complete todos los campos');
            return;
        }
        
        $userFromDB = $this->model->getAdminByUser($user);
        
        if(isset($userFromDB) && !empty($userFromDB)){
            if(password_verify($password, $userFromDB->admin_pass)){ 
                authHelper::login($userFromDB);
                header('Location: ' . BASE_URL . 'panel-admin');
            } else {
                  $this->errorView->showError('Contrasena incorrecta o usuaruo invalido');
                     }
         }
        }

    public function showPanel(){
        authHelper::verify(); 
        $this->view->showAdminPanel();
    }

    public function logout() {
        authHelper::logout();  
    }
 }