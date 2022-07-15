<?php 
		include_once('../process.php');

		if(isset($_POST['updatedata']))
		{
			//include_once('displaydb.php');
			$product_id = $_POST['product_id'];
			$product_name = $_POST['product_name'];
		    $description = $_POST['description'];
		    $stockin = $_POST['stockin'];
		    $onhand = $_POST['onhand'];
		 
		
			$sqlupdate = "UPDATE product SET product_name= '$product_name', description='$description',stockin='$stockin',onhand='$onhand'WHERE product_id = '$product_id' ";
			$sqlget = mysqli_query($config,$sqlupdate);

			if(!$sqlget) {

				echo "Something went wrong" .mysqli_connect_error($config);
			}	
			else {

				//echo "Successfully Update the Student";
				header('location: inventory.php');
			}
		}
?>