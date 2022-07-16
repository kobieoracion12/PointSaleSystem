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
	<title>Inventory</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="../css/brands.css">
	<link rel="stylesheet" type="text/css" href="../css/solid.css">
    <link rel="icon" href="../img/logo.ico">
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
	    <a class="nav-link" href="transaction.php">Transaction</a>
	    <a class="nav-link" href="product.php">Product</a>
	    <a class="nav-link active" href="inventory.php">Inventory</a>
	    <a class="nav-link" href="customer.php">Customer</a>
	    <a class="nav-link" href="supplier.php">Supplier</a>
	    <a class="nav-link" href="account.php">Account</a>
		</div>
	</div>

		<form action="logout.php">
    <!-- LOGOUT BUTTON -->
    <div class="text-end">
        <h5 class="fa-regular me-2">Welcome: <u><?php echo $_SESSION['username']; ?></u></h5>

    	<button type="button" data-bs-target="#logout" data-bs-toggle="modal" class="btn btn-danger me-5 text-end">
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
			<h4 class="m-4 ms-5">Inventory</h4>
		</div>
	</div>

<div class="container"><?php
$opt = mysqli_query($config,'SELECT* FROM product WHERE(onhand <= 10)');
while ($result = mysqli_fetch_array($opt)) { ?>

<h5 class="bg-danger text-light">[<?php echo $result['onhand']; ?>] <?php echo $result['product_name']; ?> is low in stock 

</h5><?php } ?>
</div>
<div class="container"> 
	<div class="table-responsive " id="no-more-tables"> 
		<table id="datatableid" class="table bg-white" style="width: 100%;" > 
          <thead class="bg-dark text-light">
            <tr>
             	
         	  <th hidden="">Id</th>
         	  <th>Product No#</th>
              <th>Product Name</th>
              <th hidden="">Desciption</th>
              <th>Quantity</th>
              <th>On Hand</th>
              <th>Category</th>
              <th>Expiration Date</th>
              <th align="center">Actions</th>
              
            </tr>
          </thead>
          <tbody>
         			
         			<?php 
         			$query=mysqli_query($config, "SELECT* FROM product, category WHERE(product.category_id = category.category_id)");

            	while ($row=mysqli_fetch_assoc($query)){ ?>

              <tr>
                <td hidden=""><?php echo $row['product_id']; ?></td>
                <td><?php echo $row['product_no']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td hidden=""><?php echo $row['description']; ?></td>               
                <td><?php echo $row['stockin']; ?></td>
                <td><?php echo $row['onhand']; ?></td>
                <td><?php echo $row['category_name']; ?></td>
                <td><?php echo $row['expire_date']; ?></td>
                <td>
                <button class="btn btn-warning editbtn" data-bs-toggle="modal" type="button"><i class="fas fa-edit" data-toggle="tooltip" title="edit"></i>Edit</button>

                </td>
                </tr>
                <?php } ?>
          </tbody>
           

        </table>
	</div>
</div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editmodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Edit Data </h5>
                    </div>
                    <form action="edit_inv.php" method="post">

                        <div class="modal-body">

                            <div class="form-group">
                                <label> Product No# </label>
                                <input type="text" name="product_id" id="product_id" class="form-control" hidden="">
                                <input type="text" name="product_no" id="product_no" class="form-control" readonly>
                                         
                            </div>

                            <div class="form-group">
                                <label> Product Name </label>
                                <input type="text" name="product_name" id="product_name" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label> Description </label>
                                <textarea rows="3" type="text" name="description" id="description" class="form-control" readonly></textarea>
                            </div>

                            <div class="form-group">
                                <label> Quantity </label>
                                <input type="text" name="stockin" id="stockin" class="form-control">
                            </div>                   

                            <div class="form-group">
                                <label> On Hand </label>
                                <input type="text" name="onhand" id="onhand" class="form-control">
                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel"></h5>
                                </button>
                            </div>

                            <form action="logout.php" method="POST">
                                <div class="modal-body">

                                
                                        <p align="center">Are you sure? You want to Logout?</p>

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
<script src="js/bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.editbtn').on('click', function() {

            $('#editmodal').modal('show');


            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#product_id').val(data[0]);
            $('#product_no').val(data[1]);
            $('#product_name').val(data[2]);
            $('#description').val(data[3]);
            $('#stockin').val(data[4]);
            $('#onhand').val(data[5]);

        })
    });
</script>
</body>
</html>