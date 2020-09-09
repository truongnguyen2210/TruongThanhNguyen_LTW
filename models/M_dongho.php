<?php
include_once('libs/common.php');
class dongHo extends Common{
    public function getNewDH(){
        $c = new Common();
        $sql = "SELECT * FROM products WHERE status = 1 AND goods = 'dh' ";
        $p = $c->getAll($sql);
        return $p;
    }
}
 ?>