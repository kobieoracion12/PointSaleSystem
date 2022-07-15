<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location: ../admin/dashboard.php");

  
}

include_once '../process.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="../css/brands.css">
	<link rel="stylesheet" type="text/css" href="../css/solid.css">
</head>
<body>

<!-- TOP NAVIGATION BAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
	  <img src="../img/logo.png" alt="" width="50" height="24" class="d-inline-block align-text-top ms-4 mt-1">
	</a>

	<!-- NAVIGATION BAR-->
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
	    <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
	    <a class="nav-link" href="sales_report.php?date1=0&date2=0">Sales Report</a>
	    <a class="nav-link" href="transaction.php">Transaction</a>
	    <a class="nav-link" href="product.php">Product</a>
	    <a class="nav-link" href="inventory.php">Inventory</a>
	    <a class="nav-link" href="customer.php">Customer</a>
	    <a class="nav-link" href="supplier.php">Supplier</a>
	    <a class="nav-link" href="account.php">Account</a>
		</div>
	</div>

		<form action="logout.php">
    <!-- LOGOUT BUTTON -->
    <div class="text-end">
    	<h5 class="fa-regular me-2">Welcome: <u><?php echo $_SESSION['username']; ?></u></h5>

    	<button type="submit" class="btn btn-danger me-5 text-end">
			<i class="fa-solid fa-right-from-bracket bi me-2"></i>Logout
			</button>
    </div>
    </form>
  </div>
</nav>

<!-- MAIN BODY -->
<div class="container-fluid">
	<div class="row m-1 mt-3">
		<div class="col-12">
			<h4 class="m-4 ms-5">Personal Dashboard</h4>
		</div>
	</div>

	<div class="row m-5 mt-3">
		
		<div class="col-md-4 col-sm-6 mb-2">
			<div class="card">
				<div class="card-body">

					<!-- CARD BODY -->
					<?php 
          $sql = "SELECT * FROM product";

          $mysqliStatus = $config->query($sql);

          $rows_count_value = mysqli_num_rows($mysqliStatus);

          ?>
					<div class="row m-4 mb-3">
						<div class="row">
							<div class="col-8">
								<h4><i class="fa-solid fa-solid fa-bag-shopping me-2"></i>Product</h4>

							</div>

							<div class="col-4 text-center text-success">
								<h4><?php echo $rows_count_value; ?></h4>
							</div>
						</div>
					</div>
				</div>

				
			</div>
		</div>

		
		<div class="col-md-4 col-sm-6 mb-2">
			<div class="card">
				<div class="card-body">

					<!-- CARD BODY -->
					<?php 
          $sql2 = "SELECT * FROM transaction";

          $mysqliStatus2 = $config->query($sql2);

          $rowse_count_value = mysqli_num_rows($mysqliStatus2);

          ?>
					<div class="row m-4 mb-3">
						<div class="row">
							<div class="col-8">
								<h4><i class="fa-solid fa-sack-dollar me-2"></i>Transaction</h4>

							</div>

							<div class="col-4 text-center text-success">
								<h4><?php echo $rowse_count_value; ?></h4>
							</div>
						</div>
					</div>
				</div>

				
			</div>
		</div>

		
		<div class="col-md-4 col-sm-6 mb-2">
			<div class="card">
				<div class="card-body">

					<!-- CARD BODY -->
					<?php 
          $sql3 = "SELECT * FROM supplier";

          $mysqliStatus3 = $config->query($sql3);

          $rowses_count_value = mysqli_num_rows($mysqliStatus3);

          ?>
					<div class="row m-4 mb-3">
						<div class="row">
							<div class="col-8">
								<h4><i class="fa-solid fa-money-bill-trend-up me-2"></i>Supplier</h4>

							</div>

							<div class="col-4 text-center text-success">
								<h4><?php echo $rowses_count_value; ?></h4>
							</div>
						</div>
					</div>
				</div>

				
			</div>
		</div>
	</div>
</div>



</body>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</html>