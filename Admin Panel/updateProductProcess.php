<?php
require_once ('db.php');
session_start();
$prod_name = $_POST['prod_name'];
$prod_price = $_POST['prod_price'];
$prod_stock = $_POST['prod_stock'];
$updated_at = date('Y-m-d H:i:s', time());
$update_by = $_SESSION['user']['id'];
$id = $_POST['prod_id'];
$sqlQuery = "UPDATE products SET prod_name='" . $prod_name . "', prod_price='" . $prod_price . "', prod_stock='" . $prod_stock . "', updated_at='" . $updated_at . "', update_by=" . $update_by . " WHERE prod_id=" . $id;
$result = mysqli_query($connection, $sqlQuery);
if ($result) {
    header('location:products.php?msg=Product Updated Successfully');
} else {
    header('location:editProduct.php?msg=Product Not Updated');
}
?>