<?php

include_once '../process.php';

if (isset($_POST['deletedata'])) {

    $delete = $_POST['delete_id'];

    $sql = "DELETE FROM supplier WHERE id = '$delete' ";
    $sql_run = mysqli_query($config, $sql);

    if ($sql_run) {
        header("location: supplier.php");
    }
    else{
        echo "Error deleting record";
    }
}
?>