<?php
include_once('libs/common.php');
class dienthoai extends Common{
    public function getDienThoai(){
        $c = new Common();
        $sql = "SELECT * FROM products  WHERE status = 1 and goods = 'dt'";
        
        $p = $c->getAll($sql);
        return $p;
    }
}
 ?>