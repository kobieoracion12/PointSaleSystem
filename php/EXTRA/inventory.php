<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventory</title>
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

    <!-- LOGOUT BUTTON -->
    <div class="text-end">
    	<a href="profile.php">
    		<img src="../img/kobie.jpg" class="rounded-circle border border-3 m-1 me-3" width="40px">
    	</a>

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
			<div class="text-start">
				<button class="btn btn-primary ms-5 mt-3">
					<i class="fa-solid fa-circle-plus bi me-2"></i>New
				</button>
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
					      <th scope="col">Barcode</th>
					      <th scope="col">Product Name</th>
					      <th scope="col">Qty</th>
					      <th scope="col" class="text-center">Action</th>	
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row">0</th>
					      <td>Jumbo Hakdog</td>
					      <td>69</td>
					      <td class="text-center">
				      		<button class="btn btn-outline-danger">
								<i class="fas fa-regular fa-trash bi"></i>	
							</button>

							<button class="btn btn-outline-primary ms-1">
								<i class="fas fa-regular fa-pencil bi"></i>	
							</button>

							<button class="btn btn-outline-success ms-1">
								<i class="fas fa-regular fa-dolly bi"></i>	
							</button>

							<button class="btn btn-outline-dark ms-1">
								<i class="fas fa-regular fa-eye bi"></i>	
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