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
                <li><a href="/dashboardwisatawan" class=""><i class="lnr lnr-home"></i><span>Dashboard</span></a></li>
                <li><a href="/reservasi" class=""><i class="lnr lnr-calendar-full"></i><span>Booking Camp</span></a></li>
                <li><a href="/event" class=""><i class="lnr lnr-calendar-full"></i><span>Booking for Event</span></a></li>
				<li><a href="/profile" class=""><i class="lnr lnr-users"></i><span>Profile</span></a></li>
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
                    <h3 class="page-title" style="margin-top: 9px"><strong>Dashboard</strong></h3>
                    <hr>
                    <div class="panel">
						<div class="panel-heading">
                            <h4 ><strong>Booking ID : 12</strong> </h4>
                            <hr>
                            <div class="row" style="text-align: center">
                                <div class="col-md-2" style="margin-left: 30px">
                                    <h4><strong>Nama Pemesan</strong></h4>
                                    <h4>Ni Ketut Sri Krisna Radharani Dytamika</h4>
                                </div>
                                <div class="col-md-1" >
                                    <div class="garis_verikal" ></div>
                                </div>
                                <div class="col-md-3" >
                                    <h4><strong>Tanggal Kedatangan</strong></h4>
                                    <h4>00/00/0000</h4>
                                    <h4><strong>Tanggal Kepulangan</strong></h4>
                                    <h4>00/00/0000</h4>
                                </div>
                                <div class="col-md-1" >
                                    <div class="garis_verikal" ></div>
                                </div>
                                <div class="col-md-2" >
                                    <h4><strong>Durasi</strong></h4>
                                    <h4>10 Hari</h4>
                                </div>
                                <div class="col-md-2" style="margin-top: 80px;">
                                    <div class="right">
                                    <a class="btn btn-primary" href="#" >DOWNLOAD RECEIPT</a>
                                    </div>    
                                
                                </div>
                            </div>
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
