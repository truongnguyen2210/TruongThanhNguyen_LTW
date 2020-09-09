<?php
include_once('../libs/common.php');
include_once('../libs/routing.php');
include_once('../libs/paginator.php');
class category extends Common{
    public function __construct(){
        parent::__construct();
        $this->routing = new Routing();
        $this->p = new Paginator();
    }
    
    public function getAllCategory ($limit = 10, $page = 1){
        $sql = "SELECT * FROM category WHERE trash = 0";
        $result = $this->getAll($sql);
        $config = array(
            'base_url' => $this->routing->site_url_backend('quan-ly-danh-muc'),
            'total_rows' => count($result),//tổng số record
            'per_page' => $limit,// số record trong một trang 
            'cur_page' => $page,// trang hiện tại được chọn
        );
        $this->p->init($config);
        $sql = "SELECT * FROM category WHERE trash = 0 ORDER BY parent LIMIT ".(($page - 1)*$limit).",".$limit;
        // echo $sql;
        $data = array();
        $data['category'] = $this->getAll($sql);
        $data['paginator'] = $this->p->createLinks();
        return $data;
    }
    //ham su dung cho danh muc an
    public function trashCategory (){
        $sql = "SELECT * FROM category WHERE trash = 1";
        $result = $this->getAll($sql);
        return $result;
    }
    //ham lay ten cua thang cha
    public function getParentCategory ($id){
        $sql = "SELECT * FROM category WHERE id = $id";
        // echo $sql;
        $result = $this->getOne($sql);
        return $result;
    }
    //ham kiem tra ton tai cua danh muc
    public function kiemtra($category_name){
        $sql = "SELECT category_name FROM category";
        $xet = $this->getAll($sql);
        foreach($xet as $vl)
        {
            if($vl['category_name'] == $category_name)
            {
                return 0;
            }
        }
        return 1;
    }
    //ham them danh muc
    public function addNewCategory(){
            $cat = array(
            'category_name' => $_POST['catname'],
            'slug'  => $_POST['slug'],
            'parent'  => $_POST['parent'],
            'status'  => $_POST['status'],
            'created_at'  => date("Y-m-d H:i:s")
            );
        if($this->kiemtra($_POST['catname'])==1){
            $this->addRecord("category", $cat);
           ?>
           <div class="alert alert-success text-center" role="alert">Thêm Thành Công !</div>
           <?php
        }
        else{
        ?>
           <div class="alert alert-danger text-center" role="alert">Danh Mục Đã Tồn Tại !!</div>
        <?php
        }
    }  
    //ham sua danh muc
    public function editCategory($id){
        $cat = array(
        'category_name' => $_POST['catname'],
        'slug'  => $_POST['slug'],
        'parent'  => $_POST['parent'],
        'status'  => $_POST['status'],
        'created_at'  => date("Y-m-d H:i:s")
        );
        $this->editRecord("category", $id, $cat); 
        echo "<div class='alert alert-success text-center' role='alert'>Cập Nhật Thành Công !</div>";
    }

}  
 ?>