<?php
include_once '../process.php';
session_start();

if (!isset($_SESSION["username"])) {
    header("location: ../admin/dashboard.php");

  
}

$sql = "SELECT DISTINCT customer_id, fullname FROM customer order by customer_id asc";
$result = mysqli_query($config, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control mb-3' name='customer' required>
        <option>Select Category</option>";
  while ($rows = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$rows['customer_id']."'>".$rows['fullname']."</option>";
  }

$opt .= "</select>";

?>
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
<style type="text/css">
#product-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#product-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#product-list li:hover{background:#ece3d2;cursor: pointer;}
</style>
<body>

<!-- TOP NAVIGATION BAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">
	  <img src="../img/logo.png" alt="" width="50" height="24" class="d-inline-block align-text-top ms-4 mt-1">
	</a>

	<!-- NAVIGATION BAR-->
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
		</div>
	</div>

		<form action="logout.php">
    <!-- LOGOUT BUTTON -->
    <div class="text-end">
    	<h5 class="fa-regular me-2">Welcome: <u><?php echo $_SESSION['username']; ?></u></h5>

    	<button class="btn btn-danger me-5 text-end">
			<i class="fa-solid fa-right-from-bracket bi me-2"></i>Logout
		</button>
    </div>
    </form>
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
						    	<th hidden="">ID</th>
						      <th scope="col">Prodict No#</th>
						      <th hidden="">Prodict Id#</th>
						      <th scope="col">Invoice</th>
						      <th scope="col">Quantity</th>
						      <th scope="col">Item</th>
						      <th scope="col">Price</th>
						      <th scope="col">Delete</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						  	$voice = $_GET['invoice']; 
         			$query=mysqli_query($config, "SELECT* FROM sales, product WHERE (sales.product_id = product.product_id) AND (invoice_code = $voice)");

            	while ($row=mysqli_fetch_assoc($query)){ ?>
						    <tr>
						    	<td hidden=""><?php echo $row['sales_id']; ?></td>
						      <td><?php echo $row['product_no']; ?></td>
						      <td hidden=""><?php echo $row['product_id']; ?></td>
						      <td><?php echo $row['invoice_code']; ?></td>
						      <td><?php echo $row['quantity']; ?></td>
						      <td><?php echo $row['product_name']; ?></td>
						      <td><?php echo $row['total']; ?></td>
						      <td>

						     <button class="btn btn-outline-primary btnquantity">
									<i class="fas fa-regular fa-plus"></i>	
								</button>
								<button class="btn btn-outline-danger deletebtn">
									<i class="fas fa-regular fa-trash bi"></i>	
								</button>
						      </td>
						    </tr>
						  </tbody>
						<?php }?>
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
								<p class="fw-bold lh-1">Sub Total:</p>
								<p class="fw-bold lh-1">Total:</p>
							</div>

							<?php 
         			$query=mysqli_query($config, "SELECT sum(total) AS 'sam' FROM sales WHERE invoice_code = $voice");

            	while ($row=mysqli_fetch_assoc($query)){
            	$ras = $row['sam']*0.12;
            	$new = $row['sam']+$ras;
            	 ?>


							<div class="col-6 text-start">
								<p class="lh-1">12%</p>
								<p class="lh-1"><?php echo $row['sam']; ?></p>
								<p class="lh-1 fs-4"><?php echo $new; ?></p>
							</div>
						</div>
					<?php }?>

						<!-- CHECKOUT BUTTON -->

						<div class="row">
							<div class="col-12">
								<div class="row mt-4 justify-content-center">
									<button class="btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#chargemodal">
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
						<?php
						if (isset($_GET['invalid'])) {
							echo '<h5>Item Does not Exist</h5>';
						}
						?>
						<form action="barcode.php" method="POST">
						<label for="barcode_search">Barcode Search</label>
						<input class="form-control" type="text" name="barcode_search" id="product-search" placeholder="xxxxxxxxxx" required="">
						<div id="products"></div>
						
						<input class="form-control" type="hidden" name="invoice_code" value="<?php echo $sun = $_GET['invoice'];?>">   

						<button class="btn btn-primary w-100 mt-5" name="catalog">
							<i class="fas fa-regular fa-plus bi me-2"></i>Add Catalog
						</button>

					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Quantity Modal -->
        <div class="modal fade" id="quantitymodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                    </div>
                    <form action="kiosk_quantity.php" method="post">

                        <div class="modal-body">

                        		<div class="form-group">
                                <label> Quantity </label>
                                <input type="hidden" name="update_quantity" id="update_quantity" class="form-control">
                                 <input type="hidden" name="invoice_code" value="<?php echo $bars = $_GET['invoice']?>" class="form-control">
                            </div>
                            <input type="text" name="quantity" class="form-control">
                            <input type="hidden" name="product_id" id="product_id" class="form-control">


                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="addquantity" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- Charge Modal -->
        <div class="modal fade" id="chargemodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                    </div>
                    <form action="charge.php" method="post">

                        <div class="modal-body">

                        	<?php
							$query=mysqli_query($config, "SELECT sum(total) AS 'sam' FROM sales WHERE invoice_code = $voice");

            				while ($row=mysqli_fetch_assoc($query)){ 
            				$ras = $row['sam']*0.12;
            				$new = $row['sam']+$ras;
            				?>

                        	<div class="form-group">
                                <input type="hidden" name="cashier" id="cashier" value="<?php echo $_SESSION['username']?>" class="form-control">
                                <input type="hidden" name="invoice_code" id="invoice_code" value="<?php echo $sun = $_GET['invoice'];?>" class="form-control">
                                <input type="hidden" name="total" id="total" value="<?php echo $new ?>" class="form-control">
                                <div class="form-group">
                            		<label> Customer </label>
				                        <?php
				                        echo $opt;
				                        ?>
				                    </div>
                            	</div>
                        	<?php }?>

                            <div class="form-group">
                                <label> amount </label>
                                <input type="text" name="amount" onkeyup="sum()" id="amount" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label> Balance </label>
                                <input type="text" name="balance" id="balance" class="form-control" readonly="">
                            </div>


                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="charge" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Delete Item</h5>
                            </div>
                            <form action="delete.php" method="POST">
                                <div class="modal-body">

                                <input type="hidden" name="delete_id" id="delete_id">
                                <input type="hidden" name="invoice_code" value="<?php echo $vase = $_GET['invoice']?>">
                                        <p align="center">Are you sure? You want to Delete this Item?</p>

                                        <div class="modal-footer">
                                            <button type="submit" name="deletedata" class="btn btn-success">YES</button>
                                             <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>
                                        </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


</body>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.btnquantity').on('click', function() {

            $('#quantitymodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#update_quantity').val(data[0]);
            $('#product_id').val(data[2]);

        })
    });
 </script>
 <script type="text/javascript">
    $(document).ready(function() {
        $('.deletebtn').on('click', function() {

            $('#delete').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#delete_id').val(data[0]);

        })
    });
    function sum() {
        var total = document.getElementById('total').value;
        var amount_received = document.getElementById('amount').value;
        var result = parseInt(amount_received) - parseInt(total);
        if (!isNaN(result)) {
            document.getElementById('balance').value = result;
        }
    }
 </script>
 <script type="text/javascript">
 	$(document).ready(function() {
	$("#product-search").keyup(function() {
		$.ajax({
			type: "POST",
			url: "search.php",
			data: 'keyword=' + $(this).val(),
			beforeSend: function() {
				$("#product-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
			},
			success: function(data) {
				$("#products").show();
				$("#products").html(data);
				$("#product-search").css("background", "#FFF");
			}
		});
	});
});
//To select country name
function selectproduct(val) {
	$("#product-search").val(val);
	$("#products").hide();
}

 </script>
</html>