<?php

include_once '../process.php';

if (isset($_POST['deletedata'])) {

    $delete = $_POST['delete_id'];
    $invoice_code = $_POST['invoice_code'];

    $sql = "DELETE FROM sales WHERE sales_id = '$delete' ";
    $sql_run = mysqli_query($config, $sql);

    if ($sql_run) {
        header("location: kiosk.php?invoice=$invoice_code");
    }
    else{
        echo "Error deleting record";
    }
}
?>