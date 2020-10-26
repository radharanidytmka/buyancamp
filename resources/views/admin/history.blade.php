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
				<a href="/dashboard" ><span><img src="assets/img/tepibuyan-logo.png" width="30px" class="img-circle" style="margin-right: 10px" alt="Avatar"><strong>Tepi Buyan Campfire</strong></span>
			</div>
			<div class="container-fluid">
                <div class="navbar-btn-right navbar-btn" style="margin-right: 15px; margin-top: 18px">
                    <li class="dropdown">
                        <a data-toggle="dropdown"><span><img src="assets/img/user.png" class="img-circle" style="margin-right: 10px" alt="Avatar">Hi, Admin {{auth()->user()->name}}</span><i class="icon-submenu lnr lnr-chevron-down" style="margin-left: 10px;"></i>
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
                <li><a href="/dashboard" class=""><i class="lnr lnr-calendar-full"></i><span> Daftar Reservasi</span></a></li>
                <li><a href="/history" class=""><i class="lnr lnr-chart-bars"></i><span> Riwayat Reservasi</span></a></li>
                <li><a href="/facility" class=""><i class="lnr lnr-magic-wand"></i><span> Kelola Fasilitas</span></a></li>
            </ul>
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
                    <h3 class="page-title" style="margin-top: 9px"><strong>Riwayat Reservasi</strong></h3>
                    <hr>
                    <div class="panel">
						<div class="panel-heading">
                            <!-- fitur search -->
                            <!-- <br>
                        <form class="form-auth-small" action="/dashboard/cariHistory" method="GET">
                            {{ csrf_field() }}
                            <div class="col-md-5">
                                <input name="cari" class="form-control" placeholder="Search..." value="{{ old('cari') }}" type="text">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary" style="width: 150px; height: 35px;background-color: #1688ae; border-color: #137697;">Search</button>
                            </div>
                            <br>
                        </form> -->
                        <br>
                            <table class="table">
                                <thead> 
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nama Pemesan</th>
                                        <th class="text-center">Email Pemesan</th>
                                        <th class="text-center">Tanggal Kedatangan</th>
                                        <th class="text-center">Tanggal Kepulangan</th>
                                        <th class="text-center">Durasi Kemah</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datahistory as $history)
                                    <tr class="text-center">
                                        <td>#TBC{{$history->id}}</td>
                                        <td>{{$history->nama_pemesan}}</td>
                                        <td>{{$history->email_pemesan}}</td>
                                        <td>{{$history->tgl_datang}}</td>
                                        <td>{{$history->tgl_pulang}}</td>
                                        <td>{{$history->durasi}} Hari</td>
                                        <td>
                                            <?php
                                                if($history->konfirmasi == 'true'){
                                                    echo '<span class="label label-success">Selesai</span>';
                                                } 
                                            ?>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
        <!-- END MAIN -->

        <!-- FOOTER -->
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2020 <a  target="_blank">Tepi Buyan Campfire.</a>  All Rights Reserved.</p>
			</div>
        </footer>
        <!-- END FOOTER -->
	</div>
	<!-- END WRAPPER -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
