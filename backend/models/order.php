<?php
include_once('../libs/common.php');
include_once('../libs/routing.php');
include_once('../libs/paginator.php');
class orders extends Common{
    public function __construct(){
        parent::__construct();
        $this->routing = new Routing();
        $this->p = new Paginator();
    }
    public function getOneUse ($id){
        $sql = "SELECT * FROM users WHERE id = '".$id."'";
        // echo $sql;
        $result = $this->getOne($sql);
        return $result;
    }
    public function getOnePro ($id){
        $sql = "SELECT * FROM products WHERE id = '".$id."'";
        // echo $sql;s
        $result = $this->getOne($sql);
        return $result;
    }
    public function getAllOrder ($limit = 10, $page = 1){
        $sql = "SELECT order_code, customer_id, product_id, qty, delivered, order_date FROM orders WHERE trash = 0 GROUP BY order_code, customer_id"; 
        // echo $sql;
        $result = $this->getAll($sql);
        $config = array(
            'base_url' => $this->routing->site_url_backend('quan-ly-don-hang'),
            'total_rows' => count($result),//tổng số record
            'per_page' => $limit,// số record trong một trang 
            'cur_page' => $page,// trang hiện tại được chọn
        );
        $this->p->init($config);
        $sql = "SELECT order_code, customer_id, product_id, qty, delivered, order_date FROM orders WHERE trash = 0 GROUP BY order_code, customer_id ORDER BY id LIMIT ".(($page - 1)*$limit).",".$limit;
        //  echo $sql;
        $data = array();
        $data['orders'] = $this->getAll($sql);
        $data['paginator'] = $this->p->createLinks();
        return $data;
    }
    public function getDetailOrderBYOrderCode ($order_code){
        $sql = "SELECT * FROM orders WHERE order_code = '".$order_code."'";
        // echo $sql;
        $result = $this->getAll($sql);
        return $result;
    }
    public function getOneOrderByOrderCode ($order_code){
        $sql = "SELECT * FROM orders WHERE order_code = '".$order_code."'";
        // echo $sql;
        $result = $this->getOne($sql);
        return $result;
    }
    public function getAllOrderByUser ($customer_id){
        $sql = "SELECT * FROM orders WHERE customer_id = '".$customer_id."'";
        // echo $sql;
        $result = $this->getAll($sql);
        return $result;
    }
   
}  
 ?>