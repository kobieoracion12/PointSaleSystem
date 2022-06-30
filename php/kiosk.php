<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kiosk</title>
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
	<!-- LEFT SIDE -->
	<div class="col-md-8">
		<div class="row m-1 mb-3">
			<div class="card">
				<div class="card-body m-4">
					<!-- TABLE HEADER-->
					<div class="row">
						<table class="table ">
						  <thead>
						    <tr class="text-secondary">
						      <th scope="col">Item</th>
						      <th scope="col">Qty</th>
						      <th scope="col">Price</th>
						      <th scope="col">Delete</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <td>Produce Name</td>
						      <td>1</td>
						      <td>P69</td>
						      <td>
								<button class="btn btn-outline-danger">
									<i class="fas fa-regular fa-trash bi"></i>	
								</button>
						      </td>
						    </tr>
						  </tbody>
						</table>
					</div>

					<br>

					<!-- TABLE FOOTER -->
					<div class="row">
						<hr><br>
						<!-- AMOUNT -->
						<div class="row">
							<div class="col-6">
								<p class="fw-bold lh-1">Tax:</p>
								<p class="fw-bold lh-1">Discount:</p>
								<p class="fw-bold lh-1">Sub Total:</p>
								<p class="fw-bold lh-1">Total:</p>
							</div>

							<div class="col-6 text-start">
								<p class="lh-1">0%</p>
								<p class="lh-1 text-primary">0.00</p>
								<p class="lh-1">0.00</p>
								<p class="lh-1 fs-4">0.00</p>
							</div>
						</div>

						<!-- CHECKOUT BUTTON -->
						<div class="row">
							<div class="col-12">
								<div class="row mt-4 justify-content-center">
									<button class="btn btn-outline-danger w-25 me-2">
										<i class="fas fa-regular fa-circle-xmark bi me-2"></i>Cancel
									</button>

									<button class="btn btn-primary w-25">
										<i class="fas fa-regular fa-bag-shopping bi me-2"></i>Charge
									</button>	
								</div>
							</div>
						</div>			
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- RIGHT SIDE -->
	<div class="col-md-4 mb-3">
		<div class="card m-1">
			<div class="card-body">
				<!-- IMAGE HEADER -->
				<div class="row m-4">
					<img src="../img/slider1.png" class="img-fluid mx-auto d-block" width="75%">
				</div>

				<!-- CONTENT -->
				<div class="row m-2 mt-4">
					<div class="col-12">
						<label for="barcode_search">Barcode Search</label>
						<input class="form-control" type="text" name="barcode_search" placeholder="xxxxxxxxxx">

						<label class="mt-3" for="barcode_search">Catalog Search</label>
						<input class="form-control" type="text" name="catalog_search" placeholder="">

						<button class="btn btn-primary w-100 mt-5">
							<i class="fas fa-regular fa-plus bi me-2"></i>Add Catalog
						</button>

						<button class="btn btn-secondary w-100 mt-2">
							<i class="fas fa-regular fa-ticket bi me-2"></i>Voucher
						</button>

						<button class="btn btn-success w-100 mt-2">
							<i class="fas fa-regular fa-cart-plus bi me-2"></i>New Sale
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</html>