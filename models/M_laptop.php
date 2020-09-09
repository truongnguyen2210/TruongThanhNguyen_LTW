<?php
include_once('libs/common.php');
class laptop extends Common{
    public function getLaptop(){
        $c = new Common();
        $sql = "SELECT * FROM products WHERE status = 1 AND goods = 'lt' ";
        $p = $c->getAll($sql);
        return $p;
    }
}
 ?>