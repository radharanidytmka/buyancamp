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
    <!-- DATE PICKER -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">

</head>

<body >
	<div id="wrapper" >
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="#" ><span><img src="assets/img/tepibuyan-logo.png" width="30px" class="img-circle" style="margin-right: 10px" alt="Avatar"><strong>Tepi Buyan Campfire</strong></span>
            </div>
			<div class="container-fluid">
                <div class="navbar-btn-right navbar-btn" style="margin-right: 15px; margin-top: 18px">
                    <li class="dropdown">
                        <a data-toggle="dropdown"><span><img src="assets/img/user.png" class="img-circle" style="margin-right: 10px" alt="Avatar">Hi, {{auth()->user()->name}}</span><i class="icon-submenu lnr lnr-chevron-down" style="margin-left: 10px;"></i>
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
                    <h3 class="page-title" style="margin-top: 9px"><strong>Input Data Booking Kemah</strong></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <p>Nama Pemesan</p>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input class="form-control" placeholder="Nama" value="{{auth()->user()->name}}" readonly type="text">
                            </div>
                            <br>
                            <p>Nomor Telepon Pemesan</p>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input class="form-control" placeholder="Nomor Telepon" value="{{auth()->user()->no_telepon}}" readonly type="text">
                            </div>
                            <br>
                            <p>Tanggal Kedatangan</p>
                            <div class="input-group" id="tgldatang">
                                <input type="text" class="form-control" placeholder="Tanggal Kedatangan">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <br>
                            <p>Tanggal Kepulangan</p>
                            <div class="input-group" id="tglpulang">
                                <input type="text" class="form-control" placeholder="Tanggal Kepulangan">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <br>
                            <p>Durasi</p>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                <input class="form-control" placeholder="Durasi" type="text" id="selisih">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <p>Fasilitas</p>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                <input class="form-control" placeholder="Nama" type="text">
                            </div>
                            <br>
                            <p>Any Request?</p>
                            <textarea class="form-control" placeholder="Request" type="text" rows="6"></textarea>
                            <br>
                            <div class="row">
                                <div class="col-md-8" style="margin-right: 15px; text-align: center">
                                    <h2><strong>Total : Rp 60.000,-<strong></h2>
                                </div>
                                <div class="col-md-3" style="margin-top: 20px">
                                    <a class="btn btn-primary" href="#" >BOOKING</a>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#tgldatang').datetimepicker({
                locale:'id',
                format:'DD/MMMM/YYYY'
            });
            $('#tglpulang').datetimepicker({
                useCurrent: false,
                locale:'id',
                format:'DD/MMMM/YYYY'
            });
            $('#tgldatang').on("dp.change", function(e) {
                $('#tglpulang').data("DateTimePicker").minDate(e.date);
            });
            $('#tglpulang').on("dp.change", function(e) {
                $('#tgldatang').data("DateTimePicker").maxDate(e.date);
                CalcDiff()
            });
        });
        function CalcDiff(){
            var a=$('#tgldatang').data("DateTimePicker").date();
            var b=$('#tglpulang').data("DateTimePicker").date();
                var timeDiff=0
                if (b) {
                        timeDiff = (b - a) / 1000;
                    }
            $('#selisih').val(Math.floor(timeDiff/(86400))+' Hari')   
        }
    </script>
</body>

</html>
