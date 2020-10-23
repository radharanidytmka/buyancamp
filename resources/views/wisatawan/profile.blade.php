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
                    <h3 class="page-title" style="margin-top: 9px"><strong>Profile</strong></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-4" style="margin-right: 20px; margin-left: 35px">
                            <div class="panel">
								<div class="panel-heading"  style="text-align: center">
                                    <img src="assets/img/profile.jpg" class="img-circle" width="200px" alt="Avatar">
                                    <hr>
                                    <h3><strong>{{auth()->user()->name}}</strong></h3>
                                    <p>{{auth()->user()->role}}</p>
								</div>
							</div>
                        </div>
                        <div class="col-md-7">
                            <div class="panel">
                                <div class="panel-heading"  style="text-align: right">
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#editProfile">Edit Profile</a>
                                    <!-- modal edit profile -->
                                    <div id="editProfile" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="text-align: center">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><strong>Edit Profile</strong></h4>
                                            </div>
                                            <div class="modal-body" style="text-align: left">
                                            <form class="form-auth-small" action="/user/{{auth()->user()->id}}/edit" method="POST">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <p><strong>Nama</strong></p>
                                                    <input name="edit_nama" class="form-control" placeholder="Nama" value="{{auth()->user()->name}}" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <p><strong>Email</strong></p>
                                                    <input name="edit_email" class="form-control" placeholder="Nama" value="{{auth()->user()->email}}" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <p><strong>Nomor Telepon</strong></p>
                                                    <input name="edit_no" class="form-control" placeholder="Nama" value="{{auth()->user()->no_telepon}}" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <p><strong>Alamat</strong></p>
                                                    <input name="edit_alamat" class="form-control" placeholder="Nama" value="{{auth()->user()->alamat}}" type="text">
                                                </div>
                                                <hr>
                                                <div style="text-align: right">
                                                    <button type="submit" class="btn btn-primary" style="width: 150px; height: 40px;background-color: #1688ae; border-color: #137697;">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <hr>
                                <div class="panel-body" style="text-align: left">
                                    <div class="row">
                                        <div class="col-md-4" style="margin-right: 20px">
                                            <h5><strong>Nama</strong></h5>
                                            <br>
                                            <h5><strong>Email</strong></h5>
                                            <br>
                                            <h5><strong>Nomor Telepon</strong></h5>
                                            <br>
                                            <h5><strong>Alamat</strong></h5>
                                            <!-- <br>
                                            <h5><strong>Password</strong></h5> -->
                                        </div>
                                        <div class="col-md-7">
                                            <input class="form-control" placeholder="Nama" value="{{auth()->user()->name}}" readonly type="text">
                                            <br>
                                            <input class="form-control" placeholder="Nama" value="{{auth()->user()->email}}" readonly type="text">
                                            <br>
                                            <input class="form-control" placeholder="Nama" value="{{auth()->user()->no_telepon}}" readonly type="text">
                                            <br>
                                            <input class="form-control" placeholder="Nama" value="{{auth()->user()->alamat}}" readonly type="text">
                                            <!-- <br>
                                            <a class="btn btn-primary" href="#" >Change Password</a> -->
                                        </div>
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
