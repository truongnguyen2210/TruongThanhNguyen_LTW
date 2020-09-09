<?php
include_once("db.php");
class Common extends DB{
    function __construct(){
        $this->_conn = mysqli_connect($this->_host, $this->_user,$this->_pass, $this->_db);
        if(mysqli_connect_error()){
            echo "Khong ket noi duoc  mysql" .mysqli_connect_error();
        }
        mysqli_query($this->_conn, " SET NAMES 'utf8'");
    }
    public function setQuery($sql){
        mysqli_query($this->_conn, $sql);
    }
    public function getAll($sql){
        $result = mysqli_query($this->_conn, $sql);
        $a =array();
        while($row = mysqli_fetch_assoc($result)){
            $a[] = $row;
        }
        return $a;
    }
    public function getOne($sql){
        $result = mysqli_query($this->_conn, $sql);
        $a = mysqli_fetch_array($result);
        return $a;
    }
    //id
    public function getId(){
        return mysqli_insert_id($this->_conn);
    }
    public function getAllRecords($table, $order = "ASC"){
        $sql = "SELECT * FROM ".$table." ORDER BY id = '".$order."'";
        // echo $sql;
        $result = $this->getAll($sql);
        return $result;
    }
    // hàm sử dụng cho edit
    public function getOneRecord($table, $id){
        $sql = "SELECT * FROM $table WHERE id = '$id'";
        $result = $this->getOne($sql);
        return $result;
    }

    public function addRecord($table, $params = array()){
        $sql = "INSERT INTO " .$table."(";
       $txtKey =  "";
       $txtValue = "";
       $i = 0;
       foreach($params as $key => $value){
           if ($i < count($params)-1){
            $txtKey .=  "`".$key."`,";
            $txtValue .= "'".$value."',";
           }
           else{
            $txtKey .=  "`".$key."`";
            $txtValue .= "'".$value."'";
           }
           $i++;
       }
       $sql .= $txtKey;
       $sql .= ") VALUES (";
       $sql .= $txtValue;
       $sql .= ")";
    //    echo $sql;
       $this->setQuery($sql);
    }
    // ham edit 1 record
    public function editRecord($table, $id, $params = array()){
        $sql = "UPDATE ".$table." SET ";
       $txtSet =  "";
       $i = 0;
       foreach($params as $key => $value){
           if ($i < count($params)-1){
            $txtSet .=  "$key = '$value', ";
           }
           else{
            $txtSet .=  "$key = '$value'";
           }
           $i++;
       }
       $sql .= $txtSet;
       $sql .= " WHERE id = $id";
       //echo $sql;
       $this->setQuery($sql);
    }
    // hàm sử dụng cho strash
    public function trashItem($table, $id){
        $sql = "UPDATE $table SET trash = 1 WHERE id = '$id'";
        $this->setQuery($sql);
    }
    // hàm lấy danh mục bị xóa tạm thời
    public function getNumberOfTrashItem($table){
        $sql = "SELECT * FROM $table WHERE trash = 1";
       $result = $this->getAll($sql);
       $n = count($result);
       return $n;
    }
     // hàm phục hồi danh mục 
     public function restoreItem($table, $id){
        $sql = "UPDATE $table SET trash = 0 WHERE id = '$id'";
        $this->setQuery($sql);
    }
    // hàm xóa danh mục
    public function delItem($table, $id){
        $sql = "DELETE FROM $table  WHERE id = '$id'";
        $this->setQuery($sql);
    }
}
?>