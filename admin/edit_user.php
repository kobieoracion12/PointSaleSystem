<?php 
		include_once('../process.php');

		if(isset($_POST['updatedata']))
		{
			//include_once('displaydb.php');
			$update_id = $_POST['update_id'];
			$fullname = $_POST['fullname'];
		    $username = $_POST['username'];
		    $email = $_POST['email'];
		    $contact_no = $_POST['contact_no'];
		    $position = $_POST['position'];
		    $password =$_POST['password'];
		    $pass_sec = md5($password);

		
			$sqlupdate = "UPDATE user SET fullname= '$fullname', username='$username',email='$email',contact_no='$contact_no', position='$position', password= '$pass_sec'WHERE id = '$update_id' ";
			$sqlget = mysqli_query($config,$sqlupdate);

			if(!$sqlget) {

				echo "Something went wrong" .mysqli_connect_error($config);
			}	
			else {

				//echo "Successfully Update the Student";
				header('location: account.php');
			}
		}
?>