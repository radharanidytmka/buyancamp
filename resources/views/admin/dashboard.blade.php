<!doctype html>
<html lang="en">

<head>
<title>Tepi Buyan Campfire</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	  <!-- Custom fonts for this template -->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #312F30" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
        <img src="img/tepibuyan.jpg" width="50px" class="img-profile rounded-circle" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Tepi Buyan</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
          <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Daftar Reservasi</span></a>

          <a class="nav-link" href="/history">
          <i class="fas fa-fw fa-chart-bar"></i>
          <span>Riwayat Reservasi</span></a>

          <a class="nav-link" href="/facility">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Kelola Fasilitas</span></a>

          <a class="nav-link" href="/listwisatawan">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Wisatawan</span></a>
        <br>
          <hr class="sidebar-divider my-0">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
          <span>Hi, {{auth()->user()->name}}</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
                <a class="dropdown-item" href="/logout">
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
            <h1 class="h3 mb-0 text-gray-800"><strong>Daftar Reservasi</strong></h1>
          </div>
          <hr>
          @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
          </div>
          @endif
          <br>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" style="text-align: center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama Pemesan</th>
                      <th>Tanggal Datang</th>
                      <th>Tanggal Pulang</th>
                      <th>Detail Reservasi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody >
                    @foreach($datareservasi_admin as $reservasiadmin)
                    <tr>
                        <td>#TBC{{$reservasiadmin->id}}</td>
                        <td>{{$reservasiadmin->nama_pemesan}}</td>
                        <td>{{ date("d F Y", strtotime($reservasiadmin->tgl_datang)) }}</td>
                        <td>{{ date("d F Y", strtotime($reservasiadmin->tgl_pulang)) }}</td>
                        <td><button class="btn btn-warning btn-sm" style="border-radius:10rem" data-toggle="modal" data-target="#detail{{$reservasiadmin->id}}">Show Detail</button></td>
                        <td><button class="btn-sm btn btn-primary" style="margin-left: 5px; border-radius:10rem" data-toggle="modal" data-target="#checkin{{$reservasiadmin->id}}">Check In</button></td>
                    </tr>
                    <!-- modal detail -->
                    <div id="detail{{$reservasiadmin->id}}" class="modal fade" tabindex="-1" aria-labelledby="hapusFasilitas" aria-hidden="true" role="dialog">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header" style="text-align: center">
                                    <h4 class="modal-title"><strong>Detail Reservasi #TBC{{$reservasiadmin->id}}</strong></h4>
                                </div>
                                <div class="modal-body">
                                  <div class="row no-gutters align-items-center" style="margin-left: 5px">
                                    <div class="col-md-6">
                                      <p>Nama Pemesan<br><strong>{{$reservasiadmin->nama_pemesan}}</strong></p>
                                      <p>Email Pemesan <br> <strong>{{$reservasiadmin->email_pemesan}}</strong></p>
                                      <p>Nomor Pemesan <br> <strong>{{$reservasiadmin->no_pemesan}}</strong></p>
                                    </div>
                                    <div class="col-md-6">
                                      <p>Status Pembayaran<br><strong><span class="badge-success btn-sm  mr-1" style="font-size: 10px; ">{{$reservasiadmin->status_pembayaran}}</span></strong></p>
                                      <p style="text-transform: capitalize;">Status Konfirmasi <br> <strong><span class="badge-danger btn-sm  " style="font-size: 10px; ">{{$reservasiadmin->status_konfirmasi}}</span></strong></p>
                                      <p>&nbsp;<br> <strong>&nbsp;</strong></p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row no-gutters align-items-center" style="margin-left: 5px">
                                    <div class="col-md-6">
                                      <p>Tanggal Datang<br><strong>{{ date("d F Y", strtotime($reservasiadmin->tgl_datang)) }}</strong></p>
                                      <p>Durasi Kemah <br><strong><?php 
                                        $dtg = new DateTime($reservasiadmin->tgl_datang);
                                        $plg =new DateTime($reservasiadmin->tgl_pulang);
                                        $diff = $dtg->diff($plg);
                                        echo $diff->d; echo " Hari";
                                      ?></strong></p>
                                    </div>
                                    <div class="col-md-6">
                                      <p>Tanggal Pulang<br><strong>{{ date("d F Y", strtotime($reservasiadmin->tgl_pulang)) }}</strong></p>
                                      <p>&nbsp; <br>&nbsp;</p>
                                    </div>
                                  </div>
                                  <hr>
                                  <p><strong>Fasilitas </strong></p>
                                    @php $no = 1 @endphp
                                    @foreach ($reservasiadmin->detail as $detail)
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
                                      <p>Rp {{ number_format($reservasiadmin->subtotal_fasilitas) }}</p>
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
                                      <p>Rp {{ number_format($reservasiadmin->subtotal_kemah) }}</p>
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
                                      <p>Rp {{ number_format($reservasiadmin->total_bayar) }}</p>
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
                    <!-- modal check in -->
                    <div id="checkin{{$reservasiadmin->id}}" class="modal fade" tabindex="-1" aria-labelledby="hapusFasilitas" aria-hidden="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="text-align: center">
                                    <p class="modal-title text-center"><strong>Konfirmasi Kedatangan</strong></p>
                                </div>
                                <form class="user" action="/reservasi/{{$reservasiadmin->id}}/checkin" method="POST">
                                    {{ csrf_field() }}
                                    <div class="modal-body" style="text-align: center">
                                        <p><strong>Konfirmasi reservasi dengan booking ID #TBC{{$reservasiadmin->id}} ?</strong></p>
                                    </div>
                                    <div style="text-align: center; margin-right: 10px; margin-bottom: 10px">
                                        <button type="submit" class="btn btn-user btn-sm btn-warning" style="width: 100px; border-radius:10rem">Ya</button>
                                        <button type="button" class="btn btn-sm btn-user btn-primary" data-dismiss="modal" style="width: 100px; border-radius:10rem">Tidak</button>
                                     </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
</body>
</html>
<style>
.scroll{
  width: 500px;
  padding: 10px;
  overflow: scroll;
  height: 600px;
  
  /*script tambahan khusus untuk IE */
  scrollbar-face-color: #CE7E00; 
  scrollbar-shadow-color: #FFFFFF; 
  scrollbar-highlight-color: #6F4709; 
  scrollbar-3dlight-color: #11111; 
  scrollbar-darkshadow-color: #6F4709; 
  scrollbar-track-color: #FFE8C1; 
  scrollbar-arrow-color: #6F4709;
}
</style>