<?php

include_once '../process.php';

if (isset($_POST['addproduct'])) {
    $product_no = $_POST['product_no'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $stockin = $_POST['stockin'];
    $onhand = $_POST['onhand'];
    $original_price = $_POST['original_price'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $supplier = $_POST['supplier'];
    $stockin_date = $_POST['stockin_date'];
    $expire_date = $_POST['expire_date'];

    $sql = "INSERT INTO product (product_no,product_name,description,stockin,onhand,original_price,price,category_id,supplier_id,stockin_date,expire_date)VALUES('$product_no','$product_name','$description','$stockin','$onhand','$original_price','$price','$category','$supplier','$stockin_date','$expire_date')";
    $sql_run = mysqli_query($config,$sql);

    if ($sql_run) {
      header("Location: product.php");
    }
    else {
      echo '<div class="alert alert-danger" role="alert">You have a problem in database</div>';
    }
  } 
?>