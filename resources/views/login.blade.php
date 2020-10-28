<!doctype html>
<html lang="en" class="fullscreen-bg">
<head>
	<title>Tepi Buyan Campfire</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body style="background-color: #312F30">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
							<div class="col-lg-6">
								<div class="p-5">
								<div class="text-center mt-5">
									<h1 class="h4 text-gray-900"><strong>LOGIN</strong></h1>
									<p class="mb-5"><strong>Tepi Buyan Campfire</strong></p>
								</div>
								<br>
								<form class="user mb-4" action="/postlogin" method="POST">
									{{ csrf_field() }}
									<div class="form-group">
										<input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email">
									</div>
									<div class="form-group">
										<input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
									</div>
									<button type="submit" class="mt-5 btn btn-warning btn-user btn-block" style="">LOGIN</button>
								</form>
								<hr>
								<div class="text-center mb-5">
									<p>Dont Have an Account? <a href="/register">Register here!</a></p>
								</div>
							</div> 	
					</div>
				</div>
			</div>
		</div>
	<!-- Bootstrap core JavaScript-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin-2.min.js"></script>
</body>
</html>
