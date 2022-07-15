<?php

include_once '../process.php';

if (isset($_POST['addsupplier'])) {
    $company_name = $_POST['company_name'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $contact_no = $_POST['contact_no'];

    $sql = "INSERT INTO supplier (company_name,city,province,contact_no)VALUES('$company_name','$city','$province','$contact_no')";
    $sql_run = mysqli_query($config,$sql);

    if ($sql_run) {
      header("Location: supplier.php");
    }
    else {
      echo '<div class="alert alert-danger" role="alert">You have a problem in database</div>';
    }
  } 
?>