<?php 
		include_once('../process.php');

		if(isset($_POST['updatedata']))
		{
			//include_once('displaydb.php');
			$update_id = $_POST['update_id'];
			$company_name = $_POST['company_name'];
		    $city = $_POST['city'];
		    $province = $_POST['province'];
		    $contact_no = $_POST['contact_no'];


		
			$sqlupdate = "UPDATE supplier SET company_name= '$company_name', city='$city',province='$province',contact_no='$contact_no'WHERE id = '$update_id' ";
			$sqlget = mysqli_query($config,$sqlupdate);

			if(!$sqlget) {

				echo "Something went wrong" .mysqli_connect_error($config);
			}	
			else {

				//echo "Successfully Update the Student";
				header('location: supplier.php');
			}
		}
?>