<!doctype html>
<html lang="en">

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

<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #312F30" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboardwisatawan">
        <div class="sidebar-brand-icon">
        <img src="img/tepibuyan.jpg" width="50px" class="img-profile rounded-circle" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Tepi Buyan</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
      <a class="nav-link" href="/dashboardwisatawan">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>

          <a class="nav-link" href="/pembayaran">
          <i class="fas fa-fw fa-money-bill-wave-alt"></i>
          <span>Pembayaran</span></a>

          <a class="nav-link" href="/reservasi">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>Booking Kemah</span></a>

          <a class="nav-link" href="/event">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Booking Event</span></a>

          <a class="nav-link" href="/profile">
          <i class="fas fa-fw fa-user-alt"></i>
          <span>Profil</span></a>
        <br>
          <hr class="sidebar-divider my-0">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
          <span>Hi, {{auth()->user()->name}}</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
                <a class="dropdown-item" href="/logout" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
          </div>
        </div>  
      </li><br>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <nav class="nav navbar-expand navbar-light mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> 
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><strong>Pembayaran</strong></h1>
          </div>
          <hr>
          <br>
          @foreach($datareservasi_belumbayar as $reservasiwisatawan)
            <div class="col-xl-12 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                <div class="ml-4 mt-2 row no-gutters align-items-center">
                    <div class="col-md-10">
                        <h5><strong>Booking ID : #TBC{{$reservasiwisatawan->id}}</strong></h5>
                    </div>
                    <div class="col-md-2">
                    <?php
                        if($reservasiwisatawan->status_pembayaran == 'Menunggu Pembayaran'){
                            echo '<span class="badge-danger btn-sm ml-2 mr-2" style="font-size: 10px; ">Menunggu Pembayaran</span>';
                        } elseif($reservasiwisatawan->status_pembayaran == 'Sudah Dibayar' ){
                            echo '<span class="badge-success btn-sm ml-2 mr-2" style="font-size: 10px; ">Sudah Dibayar</span>';
                        } 
                    ?>   
                    </div>         
                </div>
                <hr>
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-md-3">
                        <p><strong>Nama Pemesan</strong> <br> {{$reservasiwisatawan->nama_pemesan}}</p>
                        <p><strong>Email Pemesan</strong> <br> {{$reservasiwisatawan->email_pemesan}}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Tanggal Perkemahan</strong> <br> {{ date("d F Y", strtotime($reservasiwisatawan->tgl_datang)) }} - {{ date("d F Y", strtotime($reservasiwisatawan->tgl_pulang)) }}</p>
                        <p><strong>Durasi Kemah</strong> <br> <?php 
                          $dtg = new DateTime($reservasiwisatawan->tgl_datang);
                          $plg =new DateTime($reservasiwisatawan->tgl_pulang);
                          $diff = $dtg->diff($plg);
                          echo $diff->d; echo " Hari";
                        ?></p>
                    </div>
                    <div class="col-md-3">
                        <p><strong>Total Pembayaran : </strong> </p>
                        <p>Rp. {{$reservasiwisatawan->total_bayar}},-</p>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-warning btn-sm" style="width: 150px;border-radius:10rem " data-toggle="modal" data-target="#detail{{$reservasiwisatawan->id}}">Show Detail</button>
                        <br><br>
                        @if($reservasiwisatawan->status_pembayaran == 'Menunggu Pembayaran')
                          <a class="btn btn-warning btn-md" style="width: 150px; border-radius:10rem" href="{{ $reservasiwisatawan->payment_url }}">Bayar</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal detail -->
    <div id="detail{{$reservasiwisatawan->id}}" class="modal fade" tabindex="-1" aria-labelledby="hapusFasilitas" aria-hidden="true" role="dialog">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header" style="text-align: center">
            <h4 class="modal-title"><strong>Detail Reservasi #TBC{{$reservasiwisatawan->id}}</strong></h4>
          </div>
          <div class="modal-body">
            <div class="row no-gutters align-items-center" style="margin-left: 5px">
              <div class="col-md-6">
                <p>Nama Pemesan<br><strong>{{$reservasiwisatawan->nama_pemesan}}</strong></p>
                <p>Email Pemesan <br> <strong>{{$reservasiwisatawan->email_pemesan}}</strong></p>
                <p>Nomor Pemesan <br> <strong>{{$reservasiwisatawan->no_pemesan}}</strong></p>
              </div>
              <div class="col-md-6">
                <p>Status Pembayaran<br><strong><?php
                        if($reservasiwisatawan->status_pembayaran == 'Menunggu Pembayaran'){
                            echo '<span class="badge-danger btn-sm mr-1" style="font-size: 10px; ">Menunggu Pembayaran</span>';
                        } elseif($reservasiwisatawan->status_pembayaran == 'Sudah Dibayar' ){
                            echo '<span class="badge-success btn-sm  mr-1" style="font-size: 10px; ">Sudah Dibayar</span>';
                        } 
                    ?>  </strong></p>
                <p>&nbsp;<br> <strong>&nbsp;</strong></p>
                <p>&nbsp;<br> <strong>&nbsp;</strong></p>
              </div>
            </div>
            <hr>
            <div class="row no-gutters align-items-center" style="margin-left: 5px">
              <div class="col-md-6">
                <p>Tanggal Datang<br><strong>{{ date("d F Y", strtotime($reservasiwisatawan->tgl_datang)) }}</strong></p>
                <p>Durasi Kemah <br><strong><?php 
                  $dtg = new DateTime($reservasiwisatawan->tgl_datang);
                  $plg =new DateTime($reservasiwisatawan->tgl_pulang);
                  $diff = $dtg->diff($plg);
                  echo $diff->d; echo " Hari";
                ?></strong></p>
              </div>
              <div class="col-md-6">
                <p>Tanggal Pulang<br><strong>{{ date("d F Y", strtotime($reservasiwisatawan->tgl_pulang)) }}</strong></p>
                <p>&nbsp; <br>&nbsp;</p>
              </div>
            </div>
            <hr>
            <p><strong>Fasilitas </strong></p>
              @php $no = 1 @endphp
              @foreach ($reservasiwisatawan->detail as $detail)
              <div class="row no-gutters align-items-center" style="margin-left: 5px">
                <div class="col-md-1">
                  <p>{{ $no++ }}.</p>
                </div>
                <div class="col-md-6">
                  <p>{{ $detail->fasilitas->nama_fasilitas }} <br> {{ $detail->qty }} Unit x Rp {{ number_format($detail->harga) }}</p>
                </div>
                <div class="col-md-1" style="border-left:solid #808080 1px">
                  <p>&nbsp;</p>
                </div>
                <div class="col-md-4" >
                  <p>Rp {{ $detail->subtotal }}</p>
                </div>
              </div>
              @endforeach
              <hr>
              <div class="row no-gutters align-items-center" style="margin-left: 5px">
                <div class="col-md-7">
                  <p class="text-center"><strong>Subtotal Fasilitas</strong></p>
                </div>
                <div class="col-md-1" style="border-left:solid #808080 1px">
                  <p>&nbsp;</p>
                </div>
                <div class="col-md-4" >
                  <p>Rp {{ number_format($reservasiwisatawan->subtotal_fasilitas) }}</p>
                </div>
              </div>
              <br>
              <div class="row no-gutters align-items-center" style="margin-left: 5px">
                <div class="col-md-7">
                  <p class="text-center"><strong>Subtotal Kemah</strong></p>
                </div>
                <div class="col-md-1" style="border-left:solid #808080 1px">
                  <p>&nbsp;</p>
                </div>
                <div class="col-md-4" >
                  <p>Rp {{ number_format($reservasiwisatawan->subtotal_kemah) }}</p>
                </div>
                <br>
              </div>
              <hr>
              <div class="row no-gutters align-items-center" style="margin-left: 5px">
                <div class="col-md-7">
                  <p class="text-center"><strong>Total Pembayaran</strong></p>
                </div>
                <div class="col-md-1" style="border-left:solid #808080 1px">
                  <p>&nbsp;</p>
                </div>
                <div class="col-md-4" >
                  <p>Rp {{ number_format($reservasiwisatawan->total_bayar) }}</p>
                </div>
                <br>
              </div>
            </div>
            <div class="modal-footer" style="text-align: center">
              <hr>
              <div style="text-align: right">
                <button type="button" class="btn btn-warning btn-sm btn-user" data-dismiss="modal" style="width: 150px; border-radius:10rem">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>