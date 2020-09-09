<?php
include_once('../libs/common.php');
include_once('../libs/routing.php');
include_once('../libs/paginator.php');
class users extends Common{
    public function __construct(){
        parent::__construct();
        $this->routing = new Routing();
        $this->p = new Paginator();
    }
    public function getAllUser ($limit = 10, $page = 1){
        $sql = "SELECT * FROM users WHERE trash = 0";
        $result = $this->getAll($sql);
        $config = array(
            'base_url' => $this->routing->site_url_backend('quan-ly-nguoi-dung'),
            'total_rows' => count($result),//tổng số record
            'per_page' => $limit,// số record trong một trang 
            'cur_page' => $page,// trang hiện tại được chọn
        );
        $this->p->init($config);
        $sql = "SELECT * FROM users WHERE trash = 0 ORDER BY id LIMIT ".(($page - 1)*$limit).",".$limit;
         //echo $sql;
        $data = array();
        $data['users'] = $this->getAll($sql);
        $data['paginator'] = $this->p->createLinks();
        return $data;
    }
}  
 ?>