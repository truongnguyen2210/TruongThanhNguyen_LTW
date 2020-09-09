<?php class Routing{
    var $base_url = "http://localhost:8888/TruongThanhNguyen_LTW/";
    var $base_url_backend = "http://localhost:8888/TruongThanhNguyen_LTW/backend/";
    var $img_url = "http://localhost:8888/TruongThanhNguyen_LTW/assets/img/";
    var $index_page = "index.php";
    var $config = array (
        "trang-chu" => ["url" => "views/home/home.php","params"=>[]],
        "tin-tuc" => ["url" => "views/news/tintuc.php","params"=>[]],
        "tu-van" => ["url" => "views/contact/contact.php","params"=>[]],
        "san-pham" => ["url" => "views/product/products.php","params"=>['slug']],
        "lap-top" => ["url" => "views/product/laptop.php","params"=>[]],
        "dien-thoai" => ["url" => "views/product/dienthoai.php","params"=>[]],
        "dong-ho" => ["url" => "views/product/dongho.php","params"=>[]],
        "may-tinh-bang" => ["url" => "views/product/tablet.php","params"=>[]],
        "phu-kien" => ["url" => "views/product/phukien.php","params"=>[]],
        "chi-tiet-san-pham" => ["url" => "views/product/detail.php","params"=>['slug_detail']],
        //login 
        "dang-ky" => ["url" => "views/login/dangky.php","params"=>[]],
        "xuly-dangky" => ["url" => "views/login/xulydangky.php","params"=>[]],
        "dang-nhap" => ["url" => "views/login/dangnhap.php","params"=>[]],
        "dang-xuat" => ["url" => "views/login/dangxuat.php","params"=>[]],
        "dang-xuat" => ["url" => "views/login/dangxuat.php","params"=>[]],
        "ho-so" => ["url" => "views/cart/infocustomer.php","params"=>[]],
        //gio hang
        "gio-hang" => ["url" => "views/cart/cart.php","params"=>[]],
        "them-vao-gio-hang" => ["url" => "views/cart/addtocart.php","params"=>['id']],
        "xoa-1-sanpham-giohang" => ["url" => "views/cart/delitemcart.php","params"=>['id']],
        "xoa-sanpham-giohang" => ["url" => "views/cart/delcart.php","params"=>[]],
        "thanh-toan" => ["url" => "views/cart/savecart.php","params"=>[]],
        "xac-nhan" => ["url" => "views/cart/confirm.php","params"=>[]],
        "cap-nhat-thong-tin" => ["url" => "views/cart/edituser.php","params"=>['id']],
        
        //phan site_url cua backend
        "trang-chu" => ["url" => "views/home/home.php","params"=>[]],
        "login" => ["url" => "login.php","params"=>[]],
        //danh muc
        "quan-ly-danh-muc" => ["url" => "views/category/list.php","params"=>['page', 'size']],
        "add-category" => ["url" => "views/category/addcategory.php","params"=>[]],
        "edit-category" => ["url" => "views/category/editcategory.php","params"=>['id']],
        "delete-category" => ["url" => "views/category/deletecategory.php","params"=>['id']],
        "hidden-category" => ["url" => "views/category/hiddencategory.php","params"=>[]],
        "restore-category" => ["url" => "views/category/restorecategory.php","params"=>['id']],
        "del-category" => ["url" => "views/category/del.php","params"=>['id']],
        //san pham
        "quan-ly-san-pham" => ["url" => "views/product/list.php","params"=>['page', 'size']],
        "add-product" => ["url" => "views/product/addproduct.php","params"=>[]],
        "edit-product" => ["url" => "views/product/editproduct.php","params"=>['id']],
        "delete-product" => ["url" => "views/product/deleteproduct.php","params"=>['id']],
        "hidden-product" => ["url" => "views/product/hiddenproduct.php","params"=>[]],
        "restore-product" => ["url" => "views/product/restoreproduct.php","params"=>['id']],
        "del-product" => ["url" => "views/product/del.php","params"=>['id']],
        //nguoi dung
        "quan-ly-nguoi-dung" => ["url" => "views/user/list.php","params"=>['page', 'size']],
        //don hang
        "quan-ly-don-hang" => ["url" => "views/order/list.php","params"=>['page', 'size']],
        "chi-tiet-don-hang" => ["url" => "views/order/detailOrder.php","params"=>['order_code', 'customer_id']],
        "user-all-order" => ["url" => "views/order/userAllOrder.php","params"=>['customer_id']],


    );
    function base_url($path){
        return $this->base_url . $path;
    }
    function base_url_backend($path){
        return $this->base_url_backend . $path;
    }
    function site_url($path){
        return $this->base_url.$this->index_page . "/" .$path;
    }
    function site_url_backend($path){
        return $this->base_url_backend.$this->index_page . "/" .$path;
    }

    function get_path(){
        $view="";
        $url = $_SERVER['REQUEST_URI'];
        $arr = explode("/", $url);
        while (count($arr)>0 && $arr[0]!="index.php"){
            $arr = array_slice($arr, 1);
        }
        if(count($arr)<=1)
        {
            $view = "views/home/home.php";
        }
        if(count($arr)>1){
            $view = $this -> config[$arr[1]]['url'];
            if(count($arr)>2){
                $params = $this ->config[$arr[1]]["params"];
                $i=1;
                foreach($params as $param)
                {
                    $i++;
                    $_GET[$param] = $arr[$i];
                }
            }
        }
        return $view;
    }
}?>