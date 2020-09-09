<?php
include_once('libs/common.php');    
include_once('models/M_products.php');
class Cart extends Common{
    public function addToCart(){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
            $_SESSION['amount'] = array();
            print_r( $_SESSION['amount']);
            $_SESSION['number_of_item'] = 0;
        }
        $id = $_GET['id'];
        $k = array_search($id, $_SESSION['cart']);
        if($k == false){
            array_push($_SESSION['cart'], $id);
            array_push($_SESSION['amount'], 1);
            $_SESSION['number_of_item']++;
        }else{
            $_SESSION['amount'][$k]++;
        }
    }
    public function showCart(){
        $p = new products();
        $cart = $_SESSION['cart'];
        $n = count($cart);
        $pro = array();
        for($i = 0; $i < $n; $i++){
            $a = $p->getProductDetailById($cart[$i]);
            array_push($pro, $a);
        }   
        return $pro;
    }
    public function saveCart(){
       $c = new Common();
       $data = $this->showCart();
       $cart = $_SESSION['cart'];
       $amount = $_SESSION['amount'];
       $orderCode = mt_rand();
       for($i = 0; $i<count($cart); $i++)
       {
           $order = array(
               'order_code' =>  $orderCode,
               'customer_id' => $_SESSION['user'],
               'product_id' => $cart[$i],
               'qty' => $amount[$i],
               'order_date' => date("Y-m-d H:i:s")
           );
           $c -> addRecord("orders", $order);
       }
       session_destroy();
    }
    public function delItemCart($id){
        $k = array_search($id, $_SESSION['cart']);
        array_splice($_SESSION['cart'], $k, 1);
        array_splice($_SESSION['amount'], $k, 1);
        $_SESSION['number_of_item']--;

    }
    public function delCart(){
       unset($_SESSION['cart']);
       $_SESSION['number_of_item'] = 0;

    }
}
 ?>