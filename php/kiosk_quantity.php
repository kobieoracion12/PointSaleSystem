<?php
require_once '../process.php';

if (isset($_POST['addquantity'])){
	$update_quantity = $_POST['update_quantity'];
	$quantity = $_POST['quantity'];
	$product_id = $_POST['product_id'];
	$invoice_code = $_POST['invoice_code'];

	$sql = mysqli_query($config, "SELECT* FROM product WHERE product_id = $product_id");

	while($row = mysqli_fetch_array($sql)){
		$row1 = $row['price'];
		$pog = $row['onhand']-$quantity;

	}
	$war = "UPDATE product SET onhand = '$pog' WHERE product_id = '$product_id'";
	$pog1 = mysqli_query($config, $war);
	if($pog1){
		header("location: kiosk.php?invoice=$invoice_code");
	}
	else{
		echo 'error1, ' . $config -> error;	
	}
	$total = $quantity*$row1; 
	
	$kar = "UPDATE sales SET quantity = '$quantity', total = '$total' WHERE sales_id = '$update_quantity'";
	$rak = mysqli_query($config, $kar);
	if($rak){
		header("location: kiosk.php?invoice=$invoice_code");
	}
	else{
		echo 'error2, ' . $config -> error;	
	}
	

}
?>