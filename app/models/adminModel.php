<?php 

require_once './app/models/model.php';

class adminModel extends model{

    public function getAdminByUser($user){
        $query = $this->db->prepare('SELECT * FROM admins WHERE admin_user = ?');
        $query->execute([$user]);

        $userFromDB = $query->fetch(PDO::FETCH_OBJ);
        return $userFromDB;
    }
}