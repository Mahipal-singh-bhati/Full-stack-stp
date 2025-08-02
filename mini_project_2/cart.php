<?php
session_start();
$id = $_GET['pid'];
if(isset($_COOCKIE['cart'])){
    $data = $_COOKIE['cart'];
    $data = $data.",".$id;
    setcookie("cart",$data);
}
else{
    setcookie("cart",$id);
}
header("location:desc.php?pid=$id");
?>