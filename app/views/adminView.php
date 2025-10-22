<?php

  class adminView{
    public function showLoginForm(){
        require './templates/login.phtml';
    }

    public function showAdminPanel(){
        require './templates/panelAdmin.phtml';
    }
}