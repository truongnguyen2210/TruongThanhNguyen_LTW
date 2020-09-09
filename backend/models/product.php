<?php
include_once('../libs/common.php');
include_once('../libs/routing.php');
include_once('../libs/paginator.php');
include_once('../libs/upload.php');
class products extends Common{
    public function __construct(){
        parent::__construct();
        $this->routing = new Routing();
        $this->p = new Paginator();
    }
    //hàm lấy toàn bộ sản phẩm
    public function getAllProduct ($limit = 10, $page = 1){
        $sql = "SELECT * FROM products WHERE trash = 0";
        $result = $this->getAll($sql);
        $config = array(
            'base_url' => $this->routing->site_url_backend('quan-ly-san-pham'),
            'total_rows' => count($result),//tổng số record
            'per_page' => $limit,// số record trong một trang 
            'cur_page' => $page,// trang hiện tại được chọn
        );
        $this->p->init($config);
        $sql = "SELECT * FROM products WHERE  trash = 0 ORDER BY id LIMIT ".(($page - 1)*$limit).",".$limit;
        $data = array();
        $data['products'] = $this->getAll($sql);
        $data['paginator'] = $this->p->createLinks();
        return $data;
    }
    //ham them san pham moi
    public function addNewProduct(){
            $i = "temp.png";
            if($_FILES['image']['size'] == 0){
                echo $_FILES['image']['error'];
            }else{
                $file = $_FILES['image'];
                $i = $file['name'];
                $u = new Upload();
                $u->doUpload($file);
            }
            $pro = array(
            'product_name' => $_POST['product_name'],
            'slug'  => $_POST['slug'],
            'product_category' => $_POST['product_category'],
            'image'  => $i,
            'price'  => $_POST['price'],
            'product_detail'  => $_POST['detail'],
            'status'  => $_POST['status'],
            'created_at'  => date("Y-m-d H:i:s")
            );
            $this->addRecord("products", $pro);
        }
        //ham sua san pham
        public function editProduct($id){
            $pro = array(
            'product_name' => $_POST['product_name'],
            'slug'  => $_POST['slug'],
            'product_category'  => $_POST['product_category'],
            'product_detail'  => $_POST['product_detail'],
            'image'  => $_POST['image'],
            'price'  => $_POST['price'],
            'status'  => $_POST['status'],
            'created_at'  => date("Y-m-d H:i:s")
            );
            $this->editRecord("product", $id, $pro); 
            echo "<div class='alert alert-success text-center' role='alert'>Cập Nhật Thành Công !</div>";
        }
        //ham su dung cho danh muc an
        public function trashProduct (){
            $sql = "SELECT * FROM products WHERE trash = 1";
            // echo $sql;
            $result = $this->getAll($sql);
            return $result;
        }
    
}  
 ?>