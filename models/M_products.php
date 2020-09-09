<?php
include_once('libs/common.php');
class products extends Common{
    public function getNewProduct(){
        $c = new Common();
        $sql = "SELECT * FROM products WHERE status =1  ORDER BY created_at DESC LIMIT 0,6";
        $p = $c->getAll($sql);
        return $p;
    }
    public function getOrderProducts(){
        $c = new Common();
        $sql = "SELECT product_id, pd.id, product_name, price, slug, slug_detail, image, version, price_origin, product_detail
         FROM products pd, orders od 
         WHERE pd.id = od.product_id
         GROUP BY product_id
         ORDER BY count(qty) DESC LIMIT 0,8";
        $p = $c->getAll($sql);
        return $p;
    }
    public function getProductBySlug($slug){
        $c = new Common();
        $sql = "SELECT * FROM products pd, category ct WHERE ct.id = pd.product_category AND pd.slug = '".$slug."'";
        $p = $c->getAll($sql);
        return $p;
    }
    public function getProductDetailBySlug($slug){
        $c = new Common();
        $sql = "SELECT * FROM products  WHERE slug_detail = '".$slug."'";
        $p = $c->getOne($sql);
        return $p;
    }
    public function getProductDetailById($id){
        $c = new Common();
        $sql = "SELECT * FROM products  WHERE id = '".$id."'";
        $p = $c->getOne($sql);
        return $p;
    }
}
 ?>