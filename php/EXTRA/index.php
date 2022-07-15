<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User</title>
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
    <a class="navbar-brand" href="kiosk.php">
	  <img src="../img/logo.png" alt="" width="50" height="24" class="d-inline-block align-text-top ms-4 mt-1">
	</a>

	<!-- NAVIGATION BAR-->
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
	    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
	    <a class="nav-link" href="inventory.php">Inventory</a>
	    <a class="nav-link" href="invoice.php">Invoice</a>
	    <a class="nav-link" href="settings.php">Settings</a>
		</div>
	</div>

		<form action="logout.php">
    <!-- LOGOUT BUTTON -->
    <div class="text-end">
    	<a href="profile.php">
    		<img src="../img/kobie.jpg" class="rounded-circle border border-3 m-1 me-3" width="40px">
    	</a>

    
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
		<!-- DAILY INCOME-->
		<div class="col-md-4 col-sm-6 mb-2">
			<div class="card">
				<div class="card-body">

					<!-- CARD BODY -->
					<div class="row m-4 mb-3">
						<div class="row">
							<div class="col-8">
								<h4><i class="fa-solid fa-dollar-sign me-2"></i>Daily Income</h4>

								<div class="row ms-1">
									Your daily business income
								</div>
							</div>

							<div class="col-4 text-center text-success">
								<h4>0.00</h4>
							</div>
						</div>
					</div>
				</div>

				<div class="card-footer text-muted">
			    	<p class="m-1 mb-2"><i class="fa-solid fa-circle-info me-3"></i>Learn More</p>
			  	</div>
			</div>
		</div>

		<!-- MONTHLY INCOME -->
		<div class="col-md-4 col-sm-6 mb-2">
			<div class="card">
				<div class="card-body">

					<!-- CARD BODY -->
					<div class="row m-4 mb-3">
						<div class="row">
							<div class="col-8">
								<h4><i class="fa-solid fa-sack-dollar me-2"></i>Monthly Income</h4>

								<div class="row ms-1">
									Your monthly business income
								</div>
							</div>

							<div class="col-4 text-center text-success">
								<h4>0.00</h4>
							</div>
						</div>
					</div>
				</div>

				<div class="card-footer text-muted">
			    	<p class="m-1 mb-2"><i class="fa-solid fa-circle-info me-3"></i>Learn More</p>
			  	</div>
			</div>
		</div>

		<!-- ANNUAL INCOME -->
		<div class="col-md-4 col-sm-6 mb-2">
			<div class="card">
				<div class="card-body">

					<!-- CARD BODY -->
					<div class="row m-4 mb-3">
						<div class="row">
							<div class="col-8">
								<h4><i class="fa-solid fa-money-bill-trend-up me-2"></i>Annual Income</h4>

								<div class="row ms-1">
									Your annual business income
								</div>
							</div>

							<div class="col-4 text-center text-success">
								<h4>0.00</h4>
							</div>
						</div>
					</div>
				</div>

				<div class="card-footer text-muted">
			    	<p class="m-1 mb-2"><i class="fa-solid fa-circle-info me-3"></i>Learn More</p>
			  	</div>
			</div>
		</div>
	</div>
</div>



</body>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</html>