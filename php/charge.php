<?php

include_once '../process.php';

function createRandomPassword() {
    $chars = "003232303232023232023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}
$finalcode=createRandomPassword();

if (isset($_POST['charge'])) {
    $invoice_code = $_POST['invoice_code'];
    $cashier = $_POST['cashier'];
    $customer_id = $_POST['customer'];
    $total = $_POST['total'];
    $amount_paid = $_POST['amount'];
    $balance = $_POST['balance'];

    $sql = "INSERT INTO transaction (invoice_code,cashier,customer_id,total,amount_paid,balance)VALUES('$invoice_code','$cashier','$customer_id','$total','$amount_paid','$balance')";
    $sql_run = mysqli_query($config,$sql);

    if ($sql_run) {
      header("Location: kiosk.php?invoice=$finalcode");
    }
    else {
      echo '<div class="alert alert-danger" role="alert">You have a problem in database</div>';
    }
  } 
?>