<?php 
		include_once('../process.php');

		if(isset($_POST['updatedata']))
		{
			//include_once('displaydb.php');
			$customer_id = $_POST['customer_id'];
			$fullname = $_POST['fullname'];
		    $phone_no = $_POST['phone_no'];
		 
		
			$sqlupdate = "UPDATE customer SET fullname= '$fullname', phone_no='$phone_no'WHERE customer_id = '$customer_id' ";
			$sqlget = mysqli_query($config,$sqlupdate);

			if(!$sqlget) {

				echo "Something went wrong" .mysqli_connect_error($config);
			}	
			else {

				//echo "Successfully Update the Student";
				header('location: customer.php');
			}
		}
?>