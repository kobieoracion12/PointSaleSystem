<?php
include_once '../process.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Details</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="../css/brands.css">
	<link rel="stylesheet" type="text/css" href="../css/solid.css">
    <link rel="icon" href="../img/logo.ico">
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
    <a class="navbar-brand" href="transaction.php">
	  <img src="../img/logo.png" alt="" width="50" height="24" class="d-inline-block align-text-top ms-4 mt-1">
	</a>

		<form action="logout.php">
    <!-- LOGOUT BUTTON -->
    <div class="text-end">

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
			<h4 class="m-4 ms-5">Details</h4>
		</div>
	</div>

<div class="container"> 
	<div class="table-responsive " id="no-more-tables"> 
		<table class="table">
                            <thead>
                                <tr class="text-light" style="background: black;">
                                    <th scope="col" hidden=""><b>Invoice</b></th>
                                    <th scope="col"><b>Product Code</b></th>
                                    <th scope="col"><b>Product Name</b></th>
                                    <th scope="col"><b>Quantity</b></th>
                                    <th scope="col"><b>Price</b></th>
                                    <th scope="col"><b>Amount</b></th>
                                </tr>
                            </thead>
                            <tbody>

                            		<?php 
                            		$detail = $_GET['detail'];
									         			$query=mysqli_query($config, "SELECT * FROM sales, product WHERE (sales.product_id = product.product_id) AND (invoice_code = '$detail')");

									            	while ($row=mysqli_fetch_assoc($query)){ ?>
                               
                                
                                <tr>
                                    <td hidden=""><?php echo $_GET['detail']?></td>
                                    <td><?php echo $row['product_no']?></td>
                                    <td><?php echo $row['product_name']?></td>
                                    <td><?php echo $row['quantity']?></td>
                                    <td>₱ <?php echo $row['price']?></td>
                                    <td>₱ <?php echo $row['total']?></td>
                                </tr>


                               <?php }?>	

                               <?php 
                               $detail = $_GET['detail'];
									         			$query=mysqli_query($config, "SELECT sum(total) AS 'sam' FROM sales WHERE invoice_code = $detail");

									            	while ($row=mysqli_fetch_assoc($query)){
									            	$ras = $row['sam']*0.12;
									            	$new = $row['sam']+$ras;
									            	?>

                               	<tr>
                                    <th class="text-end" colspan="4">Tax:</th>
                                    <td colspan="5">12% </td>
                                </tr>

                                <tr>
                                    <th class="text-end" colspan="4">Sub total: </th>
                                    <td colspan="5">₱ <?php echo $row['sam']; ?></td>
                                </tr>

                                <tr>
                                    <th class="text-end" colspan="4">Total: </th>
                                    <td colspan="5">₱ <?php echo $new; ?></td>
                                </tr>
                                <?php }?>

                                <?php 
                               	$detail = $_GET['detail'];
									         			$query=mysqli_query($config, "SELECT * FROM transaction WHERE invoice_code = $detail");

									            	while ($row=mysqli_fetch_assoc($query)){
									            	?>

                                <tr>
                                    <th class="text-end" colspan="4">Amount Received: </th>
                                    <td colspan="5">₱ <?php echo $row['amount_paid'];?></td>
                                </tr>
                                <tr>
                                    <th class="text-end" colspan="4">Change: </th>
                                    <td colspan="5">₱ <?php echo $row['balance'];?></td>
                                </tr>
                              	<?php }?>
                               
                                
                            </tbody>

                        </table>
                        <input class="hidden btn btn-success" type="button" onclick="window.print()" value="Print" />
	</div>
</div>


</body>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</html>