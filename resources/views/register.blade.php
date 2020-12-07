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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
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
									<div class="form-group @if ($errors->has('reg_nama')) has-error @endif">
										<input name="reg_nama" type="text" class="form-control form-control-user" id="register-nama" placeholder="Nama">
										@if ($errors->has('reg_nama')) <p class="help-block" style="font-size: 11px; color: #FF0000; margin-top: 1px; margin-left: 4px">{{ $errors->first('reg_nama') }}<p> @endif
									</div>
									<div class="form-group @if ($errors->has('reg_email')) has-error @endif">
										<input name="reg_email" type="email" class="form-control form-control-user" id="register-email" placeholder="Email">
										@if ($errors->has('reg_email')) <p class="help-block" style="font-size: 11px; color: #FF0000; margin-top: 1px; margin-left: 4px">{{ $errors->first('reg_email') }}<p> @endif
									</div>
									<div class="form-group @if ($errors->has('reg_no')) has-error @endif">
										<input name="reg_no" type="text" class="form-control form-control-user" id="register-no" placeholder="Nomor Telepon">
										@if ($errors->has('reg_no')) <p class="help-block" style="font-size: 11px; color: #FF0000; margin-top: 1px; margin-left: 4px">{{ $errors->first('reg_no') }}<p> @endif
									</div>
									<div class="form-group @if ($errors->has('reg_tgllahir')) has-error @endif">
										<div class="input-group date" id="tgllahir">
											<input type="text" name="reg_tgllahir" class="form-control form-control-user input-group-addon" placeholder="Tanggal Lahir"> 
										</div>
										@if ($errors->has('reg_tgllahir')) <p class="help-block" style="font-size: 11px; color: #FF0000; margin-top: 1px; margin-left: 4px">{{ $errors->first('reg_tgllahir') }}<p> @endif
									</div>
									<div class="form-group @if ($errors->has('reg_alamat')) has-error @endif">
										<input name="reg_alamat" type="text" class="form-control form-control-user" id="register-alamat" placeholder="Alamat">
										@if ($errors->has('reg_alamat')) <p class="help-block" style="font-size: 11px; color: #FF0000; margin-top: 1px; margin-left: 4px">{{ $errors->first('reg_alamat') }}<p> @endif
									</div>
									<div class="form-group @if ($errors->has('reg_password')) has-error @endif">
										<input name="reg_password" type="password" class="form-control form-control-user" id="register-password" placeholder="Password">
										<p style="font-size: 11px;">Password minimal 6 karakter!</p>
										@if ($errors->has('reg_password')) <p class="help-block" style="font-size: 11px; color: #FF0000; margin-left: 4px">{{ $errors->first('reg_password') }}<p> @endif
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#tgllahir').datetimepicker({
				useCurrent: false,
				locale:'id',
				format:'YYYY-MM-DD'
			});
		});
	</script>
</body>

</html>
