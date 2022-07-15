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
	<title>Sales Report</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="../css/brands.css">
	<link rel="stylesheet" type="text/css" href="../css/solid.css">
</head>
<style type="text/css">
    @media print{
        .hidden {
            display: none;
        }
    }
</style>
<body>

<!-- TOP NAVIGATION BAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light hidden">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
	  <img src="../img/logo.png" alt="" width="50" height="24" class="d-inline-block align-text-top ms-4 mt-1">
	</a>

	<!-- NAVIGATION BAR-->
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
	    <a class="nav-link" aria-current="page" href="index.php">Dashboard</a>
	    <a class="nav-link active" href="sales_report.php?date1=0&date2=0">Sales Report</a>
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
			<h4 class="m-4 ms-5">Sales Report</h4>
		</div>
	</div>

<div class="container-fluid">
                    <div class="banner rounded mt-5 p-3 border border-2 bg-light shadow hidden">
                        <div class="">
                            <form action="sales_report.php" method="get">
                            <div class="form-group rounded-2 d-flex justify-content-around w-100 m-auto">
                                <div class="input-group">
                                    <label for="date1" class="bg-primary text-light p-2">From: </label>
                                    <input class="form-control" type="date" name="date1">
                                </div>
                                <div class="input-group ps-2">
                                    <label for="date2" class="bg-primary text-light p-2">To: </label>
                                    <input class="form-control" type="date" name="date2" >
                                </div>
                                <div class="input-group ps-2">
                                    <input class="form-control btn btn-primary" type="submit" value="Search">
                                </div>
                            </div>
                            </form>
                            <div>
                                <h5 class="text-center pt-3"><b>Showing Data</b></h5>
                                <h5 class="text-center"><?php
                                $date1 = $_GET['date1'];
                                if ($date1 == 0) {
                                    $date1 = $_GET['date1'];
                                }
                                else {
                                     $date=date_create($date1);
                                    echo '<b>From: </b>';
                                    echo date_format($date,"d/m/Y");
                                }
                                $date2 = $_GET['date2'];
                                $date1 = $_GET['date1'];
                                if ($date2 == 0) {
                                    $date2 = $_GET['date2'];
                                }
                                else {
                                    $date=date_create($date2);
                                    echo '<b> To: </b>';
                                    echo date_format($date,"d/m/Y");
                                }
                                ?>
                            </h5>
                            </div>
                        </div>
                    </div>
                    <div class="table mt-3 p-3 rounded border bg-light">
                       <table class="table" id="tables">
                            <thead>
                                <tr class="text-light" style="background: black;">
                                    <th scope="col"><b>Transaction ID</b></th>
                                    <th scope="col"><b>Transaction Date</b></th>
                                    <th scope="col"><b>Customer</b></th>
                                    <th scope="col"><b>Invoice Number</b></th>
                                    <th scope="col"><b>Amount</b></th>
                                    <th scope="col"><b>Profit</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $date1 = $_GET['date1'];
                                $date2 = $_GET['date2'];
                                $records = mysqli_query($config, "SELECT * FROM transaction,customer WHERE (transaction.customer_id = customer.customer_id) AND (sale_date BETWEEN '{$date1}' AND '{$date2}' )");

                                while ($data = mysqli_fetch_array($records)) {
                                    $date=date_create($data['sale_date']);
                                    $profit = $data['total'] * 0.05;

                                ?>
                                <tr>
                                    <td><?php echo $data['transaction_id']; ?></td>
                                    <td><?php echo date_format($date, "Y-m-d"); ?></td>
                                    <td><?php echo $data['fullname']; ?></td>
                                    <td><?php echo $data['invoice_code']; ?></td>
                                    <td>₱ <?php echo $data['total']; ?></td>
                                    <td>₱ <?php echo $profit; ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                                <?php
                                $date1 = $_GET['date1'];
                                $date2 = $_GET['date2'];
                                $records = mysqli_query($config, "SELECT sum(total) AS 'totals' FROM transaction WHERE (sale_date BETWEEN '{$date1}' AND '{$date2}' )");
                                while ($data = mysqli_fetch_array($records)) {
                                ?>
                                <tr>
                                    <th class="text-end" colspan="4">Total: </th>
                                    <td>₱ <?php echo $data['totals']; ?></td>
                                    <td>₱ <?php echo $data['totals'] * 0.05; ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <input class="hidden btn btn-primary" type="button" onclick="window.print()" value="Download Report" />
                </div>


</body>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</html>