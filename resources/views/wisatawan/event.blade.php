<!doctype html>
<html lang="en">

<head>
	<title>Tepi Buyan Campfire</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body >
	<div id="wrapper" >
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="/dashboardwisatawan" ><span><img src="assets/img/tepibuyan-logo.png" width="30px" class="img-circle" style="margin-right: 10px" alt="Avatar"><strong>Tepi Buyan Campfire</strong></span>
			</div>
			<div class="container-fluid">
                <div class="navbar-btn-right navbar-btn" style="margin-right: 15px; margin-top: 18px">
                    <li class="dropdown">
                        <a data-toggle="dropdown"><span><img src="assets/img/profile.jpg" width="25px" class="img-circle" style="margin-right: 10px" alt="Avatar">Hi, {{auth()->user()->name}}</span><i class="icon-submenu lnr lnr-chevron-down" style="margin-left: 10px;"></i>
                        <ul class="dropdown-menu">
							<li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
						</ul>
                    </li>
                </div>
			</div>
		</nav>
		<!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<ul class="nav">
                <li><a href="/dashboardwisatawan" class=""><i class="lnr lnr-home"></i><span> Dashboard</span></a></li>
                <li><a href="/pembayaran" class=""><i class="lnr lnr-home"></i><span> Pembayaran</span></a></li>
                <li><a href="/reservasi" class=""><i class="lnr lnr-calendar-full"></i><span> Booking Camp</span></a></li>
                <li><a href="/event" class=""><i class="lnr lnr-calendar-full"></i><span> Booking for Event</span></a></li>
				<li><a href="/profile" class=""><i class="lnr lnr-users"></i><span> Profile</span></a></li>
            </ul>
            <footer>
            <div class="container-fluid">
				<p class="copyright">&copy; 2020 <a  target="_blank">Tepi Buyan Campfire.</a></p>
			</div>
            </footer>
		</div>
		<!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                    <div class="navbar-btn">
                        <button type="button" class="btn-toggle-fullwidth"><img src="assets/img/gg_minimize.png" width="20px" class="img-circle" style="margin-right: 10px" alt="Avatar"></button>
                    </div>
                    <h3 class="page-title" style="margin-top: 9px"><strong>Booking for Event</strong></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12" style="text-align: justify">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>    
                    </div>
                    <br>
                    <div class="row" >
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input class="form-control" placeholder="Nama" type="text">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input class="form-control" placeholder="Email" type="text">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input class="form-control" placeholder="Subject" type="text">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <textarea class="form-control" placeholder="Message"  type="text" row="6"></textarea>
                            </div>
                            <br>
                            <a class="btn btn-primary" href="#" >SUBMIT MESSAGE</a>
                        </div>
                        <div class="col-md-6" style="text-align: center">
                            <h2 ><strong>CONTACT US!</strong></h2>
                            <br>
                            <a class="btn btn-success" style="width: 300px" href="https://wa.me/628112777135?text=Halo admin, saya mau tanya">Chat Via WhatsApp</a>
                            <br><br>
                            <a class="btn btn-danger " style="width: 300px" href="https://www.instagram.com/tepibuyancampfire/">Chat Via Instagram</a>
                        </div>
                    </div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
        <!-- END MAIN -->
	</div>
	<!-- END WRAPPER -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
