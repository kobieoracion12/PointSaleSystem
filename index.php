<?php
session_start();

if (isset($_SESSION["position"]) && $_SESSION["position"] == 'Admin') {
    header("location: admin/index.php");
    exit;
}
elseif (isset($_SESSION["position"]) && $_SESSION["position"] == 'User') {
    header("location: php/kiosk.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="css/brands.css">
	<link rel="stylesheet" type="text/css" href="css/solid.css">
	<link rel="icon" href="img/logo.ico">
</head>
<body class="login-background">

<!-- MAIN BODY -->
<div class="d-flex justify-content-center align-items-center vh-100 pb-5 pt-5">
  <div class="card bg-white rounded-3 w-75 h-100">
    <div class="card-body">
      <div class="container-fluid">
        <div class="row">

        	<div class="col-md-6 col-sm-12">
        		<img class="login-vector" src="img/login-vector.jpg">
        	</div>

        	<div class="col-md-6 col-sm-12 p-5 pt-5 mt-5 text-center">
        		<h4 class="fs-1">Welcome!</h4>
        		<p>Sign in to your Account</p>

        		<form class="form-control border-0 mt-2" action="auth.php" method="post">

        			<!-- USERNAME -->
        			<div class="input-group flex-nowrap">
							  <span class="input-group-text bg-white text-muted border-end-0" id="addon-wrapping"><i class="fa-solid fa-user"></i></span>
							  <input name="username" type="text" class="form-control border-start-0" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
							</div>

							<!-- PASSWORD -->
        			<div class="input-group flex-nowrap mt-3">
							  <span class="input-group-text bg-white text-muted" id="addon-wrapping"><i class="fa-solid fa-lock"></i></span>
							  <input name="password" type="password" class="form-control border-start-0" placeholder="Password" aria-label="Username" aria-describedby="addon-wrapping">
							</div>

							<div class="row m-5 mt-4">
								<button class="btn btn-outline-primary mb-2" type="submit">Login</button>
								<br>
							</div>

							<div class="row">
								<figcaption class="blockquote-footer">Jireh | John Lloyd | Kobie POS System
									<br>BS Information Technology 3C WAM</figcaption>
							</div>
        		</form>
        	</div>
        </div>
			</div>
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
<script type="text/javascript" src="js/bootstrap.js"></script>
</html>