<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Invoice</title>
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

	<!-- LEFT SIDE-->
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    	<div class="navbar-nav">
		    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
		    <a class="nav-link" href="inventory.php">Inventory</a>
		    <a class="nav-link" href="invoice.php">Invoice</a>
		    <a class="nav-link" href="pricing.php">Pricing</a>
    	</div>
    </div>

    <!-- LOGOUT BUTTON -->
    <div class="text-end">
    	<button class="btn btn-danger me-5 text-end">
			<i class="fa-solid fa-right-from-bracket bi me-2"></i>Logout
		</button>
    </div>
  </div>
</nav>

<!-- MAIN BODY -->
<div class="row m-1 mt-3">
	<div class="col-12">

		<!-- ADD/NEW BUTTON -->
		<div class="row">
			<div class="col-2 text-start">
				<p class="ms-5 mt-3 mb-0 fs-5">Purchase Invoice</p>
			</div>
		</div>

		<!-- MAIN -->
		<div class="card m-4 d-flex">
			<div class="card-body">

				<!-- MAIN HEADER -->
				<div class="row m-3">
					<form class="d-flex">
				        <input class="form-control me-1 w-75" type="search" placeholder="Search" aria-label="Search">

				        <select class="form-select w-25 ms-2" aria-label="Default select example">
								  <option selected>Stocked</option>
								  <option value="1">Out of Stock</option>
								  <option value="2">Running Out</option>
								</select>

				        <button class="btn btn-outline-success ms-2 me-2" type="submit">Search</button>
				      </form>
				</div>

				<!-- TABLE -->
				<div class="row m-5 mt-4">
					<table class="table table-borderless table-hover">
					  <thead>
					    <tr class="table-secondary">
					      <th scope="col">Date</th>
					      <th scope="col">Purchase No.</th>
					      <th scope="col">MOP</th>
					      <th scope="col">Status</th>
					      <th scope="col">Amount</th>
					      <th scope="col" class="text-center">Action</th>	
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row">06/30/21</th>
					      <td>202200001</td>
					      <td>Counter</td>
					      <td>Closed</td>
					      <td>2,000.00</td>
					      <td class="text-center">
					      	<button class="btn btn-outline-dark ms-1">
										<i class="fas fa-regular fa-box-archive bi"></i>	
									</button>

									<button class="btn btn-outline-success ms-1">
										<i class="fas fa-regular fa-scroll bi"></i>	
									</button>

									<button class="btn btn-outline-primary ms-1">
										<i class="fas fa-regular fa-print bi"></i>	
									</button>
					      </td>
					    </tr>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</html>