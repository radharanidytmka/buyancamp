<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Tepi Buyan Campfire</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link sizes="76x76" href="assets/img/tepi-buyan.png">
	<!-- <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png"> -->
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box" >
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets/img/tepi-buyan-removebg-preview.png" alt="Klorofil Logo"></div>
								<p class="lead"><strong>REGISTER</strong></p>
							</div>
                            <form class="form-auth-small" action="/postlogin" method="POST">
                                {{ csrf_field() }}
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input name="email" type="email" class="form-control" id="signin-email" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input name="password" type="password" class="form-control" id="signin-password" placeholder="Password">
								</div>
								<button type="submit" class="btn btn-primary" style="width: 200px">REGISTER</button>
							</form>
							<div class="footer">
								<br>
								<div class="mb-1">
									<span class="line"></span>
									<span class="or">or</span>
									<span class="line"></span>
								</div> 
								<br>
								<p >Already have an account? <a href="/login" >Login</a></p>
							</div>
						</div>
					</div>
					<div class="right">
					</div>
					<!-- <div class="clearfix"></div> -->
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
