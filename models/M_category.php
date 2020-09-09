<?php
include_once('libs/common.php');
class category extends Common{
    public function getCategoryByParent($id){
        $c = new Common();
        $sql = "SELECT * FROM category WHERE parent =".$id." AND status = 1 AND trash = 0";
        $p = $c->getAll($sql);
        return $p;
    }
}
 ?>