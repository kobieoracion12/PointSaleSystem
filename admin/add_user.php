<?php

include_once '../process.php';

if (isset($_POST['addaccount'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $position = $_POST['position'];
    $password =$_POST['password'];
    $sec_pass = md5($password);

    $sql = "INSERT INTO user (fullname,username,email,contact_no,position,password)VALUES('$fullname','$username','$email','$contact_no','$position','$sec_pass')";
    $sql_run = mysqli_query($config,$sql);

    if ($sql_run) {
      header("Location: account.php");
    }
    else {
      echo '<div class="alert alert-danger" role="alert">You have a problem in database</div>';
    }
  } 
?>