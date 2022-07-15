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
	<title>Transaction</title>
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
	    <a class="nav-link" aria-current="page" href="index.php">Dashboard</a>
	    <a class="nav-link" href="sales_report.php?date1=0&date2=0">Sales Report</a>
	    <a class="nav-link active" href="transaction.php">Transaction</a>
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
			<h4 class="m-4 ms-5">Transaction</h4>
		</div>
	</div>

<div class="container"> 
	<div class="table-responsive " id="no-more-tables"> 
		<table id="datatableid" class="table bg-white" style="width: 100%;" > 
          <thead class="bg-dark text-light">
            <tr>
             
             	<th>Id</th>
             	<th>Invoice</th>
              <th>Customer</th>
              <th>Date of Sales</th>
              <th align="center">Actions</th>
              
            </tr>
          </thead>
          <tbody>
         			
         			<?php 
         			$query=mysqli_query($config, "SELECT * FROM transaction, customer WHERE (transaction.customer_id = customer.customer_id)");

            	while ($row=mysqli_fetch_assoc($query)){ ?>

              <tr>
                <td ><?php echo $row['transaction_id'];?></td>
                <td><?php echo $row['invoice_code']; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['sale_date']; ?></td>
                <td>
                <a href="print.php?detail=<?php echo $row['invoice_code'];?>" class="btn btn-primary"><i class="fas fa-eye" data-toggle="tooltip" title="view"></i> View</a>
                </td>
                </tr>
                <?php } ?>
          </tbody>
           

        </table>
	</div>
</div>


</body>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</html>