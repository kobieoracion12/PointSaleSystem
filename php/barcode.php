<?php
require_once '../process.php';

if (isset($_POST['catalog'])){
	$barcode = $_POST['barcode_search'];
	$invoice_code = $_POST['invoice_code'];
	$pos = "SELECT* FROM product WHERE product_no = '$barcode'";

	$sql = mysqli_query($config, $pos);

	while ($opt = mysqli_fetch_array($sql)){
		$product_id = $opt['product_id'];
		$product_name = $opt['product_name'];
		$price = $opt['price'];
		$quantity = '1';
		$war = $price*$quantity;



	}
	if ($sql){
		$row = "INSERT INTO sales (product_id,quantity,total,invoice_code) VALUES ('$product_id','$quantity','$war','$invoice_code')";
		$may = mysqli_query($config, $row);

		if ($may){
			$raw = "SELECT* FROM product WHERE product_no = '$barcode'";
			$raw1 = mysqli_query($config, $raw);
			if($raw1){
				while ($pog = mysqli_fetch_array($raw1)){

					$pog1 = $pog['onhand'];

					$gop = $pog1-$quantity;

					$gop1 = "UPDATE product SET onhand = '$gop' WHERE product_no = '$barcode'";

					$dog = mysqli_query($config, $gop1);
					if($dog){
						header("location: kiosk.php?invoice=$invoice_code");
					}
					else{
					echo 'error1, ' . $config -> error;	
					}
				}
			}
			else{
			echo 'error2, ' . $config -> error;	
			}
		}
		else {

			header("location: kiosk.php?invalid&invoice=$invoice_code");
		}
	}

}

?>