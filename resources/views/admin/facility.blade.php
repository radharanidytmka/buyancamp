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
                        <a data-toggle="dropdown"><span><img src="assets/img/profile.jpg" class="img-circle" width="25px" style="margin-right: 10px" alt="Avatar">Hi, Admin {{auth()->user()->name}}</span><i class="icon-submenu lnr lnr-chevron-down" style="margin-left: 10px;"></i>
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
                <li><a href="/dashboard" class=""><i class="lnr lnr-calendar-full"></i><span>Daftar Reservasi</span></a></li>
                <li><a href="/history" class=""><i class="lnr lnr-chart-bars"></i><span>Riwayat Reservasi</span></a></li>
                <li><a href="/facility" class=""><i class="lnr lnr-magic-wand"></i><span>Kelola Fasilitas</span></a></li>
                <li><a href="#" class=""><i class="lnr lnr-license"></i><span>Laporan Keuangan</span></a></li>
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
                    <h3 class="page-title" style="margin-top: 9px"><strong>Kelola Fasilitas</strong></h3>
                    <hr>
                    <div class="panel">
						<div class="panel-heading">
                        <div class="text-right">
                            <a class="btn btn-primary" style="margin-left: 5px" data-toggle="modal" data-target="#tambahFasilitas">Tambah Fasilitas</a>
                        </div>
                        <br>
                        <table class="table">
                            <thead> 
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama Fasilitas</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($data_fasilitas as $fasilitas)
                                <tr class="text-center">
                                    <td>{{$no++}}</td>
                                    <td>{{$fasilitas->nama_fasilitas}}</td>
                                    <td>Rp. {{$fasilitas->harga}},-</td>
                                    <td>{{$fasilitas->jumlah}} Unit </td>
                                    <td><a class="btn btn-warning" data-toggle="modal" data-target="#editFasilitas{{$fasilitas->id}}">Edit</a>
                                    <a class="btn btn-danger" style="margin-left: 5px" data-toggle="modal" data-target="#hapusFasilitas{{$fasilitas->id}}">Delete</a></td>
                                </tr>
                                <!-- modal edit -->
                                <div id="editFasilitas{{$fasilitas->id}}" class="modal fade" tabindex="-1" aria-labelledby="editFasilitas" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="text-align: center">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><strong>Edit Fasilitas</strong></h4>
                                            </div>
                                            <div class="modal-body" style="text-align: left">
                                                <form class="form-auth-small" action="/facility/{{$fasilitas->id}}/edit" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <p><strong>Nama Fasilitas</strong></p>
                                                        <input name="edit_namafasilitas" class="form-control" placeholder="Nama" value="{{$fasilitas->nama_fasilitas}}" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <p><strong>Harga</strong></p>
                                                        <input name="edit_harga" class="form-control" placeholder="Nama" value="{{$fasilitas->harga}}" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <p><strong>Jumlah</strong></p>
                                                        <input name="edit_jumlah" class="form-control" placeholder="Nama" value="{{$fasilitas->jumlah}}" type="text">
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
                                <!-- modal hapus -->
                                <div id="hapusFasilitas{{$fasilitas->id}}" class="modal fade" tabindex="-1" aria-labelledby="hapusFasilitas" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="text-align: center">
                                                <h4 class="modal-title"><strong>Hapus Fasilitas</strong></h4>
                                            </div>
                                            <form class="form-auth-small" action="/facility/{{$fasilitas->id}}/hapus" method="POST">
                                                {{ csrf_field() }}
                                                <div class="modal-body" style="text-align: center">
                                                    <h4><strong>Yakin hapus fasilitas {{$fasilitas->nama_fasilitas}} ?</strong></h4>
                                                </div>
                                                <hr>
                                                <div style="text-align: center; margin-right: 10px; margin-bottom: 10px">
                                                    <button type="submit" class="btn btn-primary" style="width: 150px; height: 40px;background-color: #1688ae; border-color: #137697;">Ya</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 150px; height: 40px;background-color: #1688ae; border-color: #137697;">Tidak</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- modal tambah fasilitas -->
                        <div id="tambahFasilitas" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="text-align: center">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><strong>Tambah Fasilitas</strong></h4>
                                    </div>
                                    <div class="modal-body" style="text-align: left">
                                        <form class="form-auth-small" action="/facility/create" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <p><strong>Nama Fasilitas</strong></p>
                                                <input name="create_namafasilitas" class="form-control" placeholder="Nama Fasilitas" type="text">
                                            </div>
                                            <div class="form-group">
                                                <p><strong>Harga</strong></p>
                                                <input name="create_harga" class="form-control" placeholder="Harga" type="text">
                                            </div>
                                            <div class="form-group">
                                                <p><strong>Jumlah</strong></p>
                                                <input name="create_jumlah" class="form-control" placeholder="Jumlah" type="text">
                                            </div>
                                            <hr>
                                            <div style="text-align: right">
                                                <button type="submit" class="btn btn-primary" style="width: 150px; height: 40px;background-color: #1688ae; border-color: #137697;">Submit</button>
                                            </div>
                                        </form>
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
