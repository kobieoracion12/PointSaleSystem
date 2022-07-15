<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location: ../admin/dashboard.php");

  
}

include_once '../process.php';


$sql = "SELECT DISTINCT category_id, category_name FROM category order by category_id asc";
$result = mysqli_query($config, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control mb-3' name='category' required>
        <option selected disabled>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
  }

$opt .= "</select>";

$sql1 = "SELECT DISTINCT id, company_name FROM supplier order by id asc";
$result1 = mysqli_query($config, $sql1) or die ("Bad SQL: $sql1");

$opt1 = "<select class='form-control mb-3' name='supplier' required>
        <option selected disabled>Select Supplier</option>";
  while ($row1 = mysqli_fetch_assoc($result1)) {
    $opt1 .= "<option value='".$row1['id']."'>".$row1['company_name']."</option>";
  }

$opt1 .= "</select>";



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product</title>
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
	    <a class="nav-link" href="transaction.php">Transaction</a>
	    <a class="nav-link active" href="product.php">Product</a>
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
			<h4 class="m-4 ms-5">Product</h4>
		</div>
	</div>

<div class="container"> 
	<button type="button" class="btn btn-primary pb-2" data-bs-toggle="modal" data-bs-target="#addmodal" style="margin-bottom: 20px;">ADD
</button>
	<div class="table-responsive " id="no-more-tables"> 
		<table id="datatableid" class="table bg-white" style="width: 100%;" > 
          <thead class="bg-dark text-light">
            <tr>
             	
             	<th hidden="">Id</th>
             	<th>Product No#</th>
              <th>Product Name</th>
              <th hidden="">Desciption</th>
              <th hidden="">Original Price</th>
              <th>Price</th>
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
                <td hidden=""><?php echo $row['original_price']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['category_name']; ?></td>
                <td><?php echo $row['expire_date']; ?></td>
                <td>
                <button class="btn btn-warning editbtn" data-bs-toggle="modal" type="button"><i class="fas fa-edit" data-toggle="tooltip" title="edit"></i>Edit</button>

                <button class="btn btn-danger deletebtn" data-bs-toggle="modal" type="button"><i class="fas fa-trash" data-toggle="tooltip" title="delete"></i>Delete</button>
                </td>
                </tr>
                <?php } ?>
          </tbody>
           

        </table>
	</div>
</div>

<!-- Add Modal -->
        <div class="modal fade" id="addmodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Add Product </h5>
                    </div>
                    <form action="add_prod.php" method="post">

                        <div class="modal-body">

                        		<div class="form-group">
                                <label> Product No# </label>
                                <input value="<?php 
                                        $prefix= time()*rand(1, 9); echo strip_tags(substr($prefix ,0,8));?>" type="text" name="product_no" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label> Product Name </label>
                                <input type="text" name="product_name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> Description </label>
                                <textarea rows="3" type="text" name="description" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label> Quantity </label>
                                <input type="text" name="stockin" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> On Hand </label>
                                <input type="text" name="onhand" class="form-control">
                            </div>  

                            <div class="form-group">
                                <label> Original Price </label>
                                <input type="text" name="original_price" class="form-control">
                            </div>                   

                            <div class="form-group">
                                <label> Price </label>
                                <input type="text" name="price" class="form-control">
                            </div>

                            <div class="form-group">
                            		<label> Category </label>
				                        <?php
				                        echo $opt;
				                        ?>
				                    </div>

				                    <div class="form-group">
                                <label> Select Supplier </label>
                                <?php
				                        echo $opt1;
				                        ?>
                            </div>

                            <div class="form-group">
                                <label> Date Stockin </label>
                                <input type="date" name="stockin_date" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> Expiration Date </label>
                                <input type="date" name="expire_date" class="form-control">
                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="addproduct" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editmodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Edit Data </h5>
                    </div>
                    <form action="edit_prod.php" method="post">

                        <div class="modal-body">

                            <div class="form-group">
                                <label> Product No# </label>
                                <input type="text" name="product_id" id="product_id" class="form-control" hidden="">
                                <input type="text" name="product_no" id="product_no" class="form-control" readonly>
                                         
                            </div>

                            <div class="form-group">
                                <label> Product Name </label>
                                <input type="text" name="product_name" id="product_name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> Description </label>
                                <textarea rows="3" type="text" name="description" id="description" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label> Original Price </label>
                                <input type="text" name="original_price" id="original_price" class="form-control">
                            </div>                   

                            <div class="form-group">
                                <label> Price </label>
                                <input type="text" name="price" id="price" class="form-control">
                            </div>

                            <div class="form-group">
                            		<label> Category </label>
				                        <?php
				                        echo $opt;
				                        ?>
				                    </div>

				                    <div class="form-group">
                                <label> Select Supplier </label>
                                <?php
				                        echo $opt1;
				                        ?>
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

        <!-- Delete Modal -->
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Delete Supplier</h5>
                                </button>
                            </div>

                            <form action="prod_delete.php" method="POST">
                                <div class="modal-body">

                                <input type="hidden" name="delete_id" id="delete_id">
                                        <p align="center">Are you sure? You want to Delete this Supplier?</p>

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
            $('#original_price').val(data[4]);
            $('#price').val(data[5]);

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
 </script>
</html>