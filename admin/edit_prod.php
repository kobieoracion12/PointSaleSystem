<?php 
		include_once('../process.php');

		if(isset($_POST['updatedata']))
		{
			//include_once('displaydb.php');
			$product_id = $_POST['product_id'];
			$product_name = $_POST['product_name'];
		    $description = $_POST['description'];
		    $original_price = $_POST['original_price'];
		    $price = $_POST['price'];
		    $category = $_POST['category'];
    		$supplier = $_POST['supplier'];


		
			$sqlupdate = "UPDATE product SET product_name= '$product_name', description='$description',original_price='$original_price',price='$price',category_id= '$category',supplier_id= '$supplier' WHERE product_id = '$product_id' ";
			$sqlget = mysqli_query($config,$sqlupdate);

			if(!$sqlget) {

				echo "Something went wrong" .mysqli_connect_error($config);
			}	
			else {

				//echo "Successfully Update the Student";
				header('location: product.php');
			}
		}
?>