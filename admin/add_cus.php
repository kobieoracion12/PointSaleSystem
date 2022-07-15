<?php

include_once '../process.php';

if (isset($_POST['addcustomer'])) {
    $fullname = $_POST['fullname'];
    $phone_no = $_POST['phone_no'];

    $sql = "INSERT INTO customer (fullname,phone_no)VALUES('$fullname','$phone_no')";
    $sql_run = mysqli_query($config,$sql);

    if ($sql_run) {
      header("Location: customer.php");
    }
    else {
      echo '<div class="alert alert-danger" role="alert">You have a problem in database</div>';
    }
  } 
?>