<?php

require_once ('db.php');
session_start();
$prod_name = $_POST['prod_name'];
$prod_price = $_POST['prod_price'];
$prod_stock = $_POST['prod_stock'];
$created_at = date('Y-m-d H:i:s', time());
$added_by = $_SESSION['user']['id'];

$sqlQuerry = "INSERT  INTO products (prod_name,prod_price,prod_stock,created_at,added_by) VALUES ('" . $prod_name . "','" . $prod_price . "','" . $prod_stock . "','" . $created_at . "','" . $added_by . "')";
$result=mysqli_query($connection,$sqlQuerry);
if($result){
    header("location:products.php?msg=Product Added Successfully");
}else{
    header("location:addProduct.php?msg=Product Not Add Successfully");
}