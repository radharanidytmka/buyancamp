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
	<!-- Date Picker -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" />
</head>

<body style="background-color: #312f30">
<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg mt-5">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
							<div class="col-lg-6">
								<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900"><strong>REGISTER</strong></h1>
									<p class=""><strong>Tepi Buyan Campfire</strong></p>
								</div>
								<form class="user" action="/user/create" method="POST">
									{{ csrf_field() }}
									<div class="form-group">
										<input name="reg_nama" type="text" class="form-control form-control-user" id="register-nama" placeholder="Nama">
									</div>
									<div class="form-group">
										<input name="reg_email" type="email" class="form-control form-control-user" id="register-email" placeholder="Email">
									</div>
									<div class="form-group">
										<input name="reg_no" type="text" class="form-control form-control-user" id="register-no" placeholder="Nomor Telepon">
									</div>
									<div class="form-group">
										<input type="text" class="form-control form-control-user datepicker" id="date" name="reg_tgllahir" placeholder="Tanggal Lahir">
                                	</div>
									<div class="form-group">
										<input name="reg_alamat" type="text" class="form-control form-control-user" id="register-alamat" placeholder="Alamat">
									</div>
									<div class="form-group">
										<input name="reg_password" type="password" class="form-control form-control-user" id="register-password" placeholder="Password">
									</div>
									<button type="submit" class="btn btn-warning btn-user btn-block" style="">REGISTER</button>
								</form>
								<hr>
								<div class="text-center">
									<p>Already Have an Account? <a class="" href="/login">Login here!</a></p>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
	<script>
	$(function(){
		$(".datepicker").datepicker({
		format: 'dd-mm-yyyy',
		autoclose: true,
		todayHighlight: true,
		});
	});
	</script>
</body>

</html>
