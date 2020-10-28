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
          <span>Reservation List</span></a>

          <a class="nav-link" href="/history">
          <i class="fas fa-fw fa-chart-bar"></i>
          <span>History List</span></a>

          <a class="nav-link" href="/facility">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Manage Facility</span></a>
        <br>
          <hr class="sidebar-divider my-0">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
          <span>Hi, {{auth()->user()->name}}</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
                      <th>Durasi Kemah</th>
                      <th>Detail Reservasi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody >
                    @foreach($datareservasi_admin as $reservasiadmin)
                    <tr>
                        <td>#TBC{{$reservasiadmin->id}}</td>
                        <td>{{$reservasiadmin->nama_pemesan}}</td>
                        <td>{{$reservasiadmin->tgl_datang}}</td>
                        <td>{{$reservasiadmin->tgl_pulang}}</td>
                        <td>{{$reservasiadmin->durasi}} Hari</td>
                        <td><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{$reservasiadmin->id}}">Show Detail</button></td>
                        <td><button class="btn-sm btn btn-primary" style="margin-left: 5px" data-toggle="modal" data-target="#checkin{{$reservasiadmin->id}}">Check In</button></td>
                    </tr>
                    <!-- modal detail -->
                    <div id="detail{{$reservasiadmin->id}}" class="modal fade" tabindex="-1" aria-labelledby="hapusFasilitas" aria-hidden="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="text-align: center">
                                    <h4 class="modal-title"><strong>Detail Reservasi #TBC{{$reservasiadmin->id}}</strong></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>tes</p>
                                                    <hr>
                                                    <div style="text-align: right">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 150px; height: 40px;background-color: #1688ae; border-color: #137697;">Close</button>
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
                                                    <h4 class="modal-title"><strong>Konfirmasi Kedatangan</strong></h4>
                                                </div>
                                                <form class="form-auth-small" action="/reservasi/{{$reservasiadmin->id}}/checkin" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body" style="text-align: center">
                                                        <h4><strong>Konfirmasi reservasi dengan booking ID #TBC{{$reservasiadmin->id}} ?</strong></h4>
                                                    </div>
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
              </div>
            </div>
          </div>
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="/logout">Logout</a>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
</body>
</html>