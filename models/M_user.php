<?php
include_once('libs/common.php');    
include_once('models/M_products.php');
class User extends Common{
    public function getOneUse ($id){
        $sql = "SELECT * FROM users WHERE id = '".$id."'";
        // echo $sql;
        $result = $this->getOne($sql);
        return $result;
    }
    public function editProfile($id){
        $cat = array(
        'email' => $_POST['email'],
        'name'  => $_POST['name'],
        'phone'  => $_POST['phone'],
        'address'  => $_POST['address'],
        'created_at'  => date("Y-m-d H:i:s")
        );
        $this->editRecord("users", $id, $cat); 
    }
}
 ?>
 