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
            <h1 class="h3 mb-0 text-gray-800"><strong>Kelola Fasilitas</strong></h1>
          </div>
          <hr>
          <br>
          <div class="card shadow mb-4">
            <div class="card-body">
            @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong>
              </div>
            @endif

            @if ($message = Session::get('error'))
								<div class="alert alert-danger alert-block">
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
              <button class="btn btn-warning btn-sm " style="margin-left: 5px; float: right; border-radius:10rem" data-toggle="modal" data-target="#tambahFasilitas">Tambah Fasilitas</button>
              <div class="table-responsive">
                  <hr>
                <table class="table table-bordered" style="text-align: center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama Fasilitas</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody >
                    @php $no = 1; @endphp
                    @foreach($data_fasilitas as $fasilitas)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$fasilitas->nama_fasilitas}}</td>
                        <td>Rp {{number_format($fasilitas->harga)}},-</td>
                        <td>{{$fasilitas->jumlah}}</td>
                        <td><button class="btn btn-sm btn-warning" data-toggle="modal" style="width: 80px; border-radius:10rem" data-target="#editFasilitas{{$fasilitas->id}}">Edit</button>
                        <button class="btn btn-sm btn-primary" style="margin-left: 5px; width: 80px; border-radius:10rem" data-toggle="modal" data-target="#hapusFasilitas{{$fasilitas->id}}">Delete</button></td>
                    </tr>
                    <!-- modal edit -->
                    <div id="editFasilitas{{$fasilitas->id}}" class="modal fade" tabindex="-1" aria-labelledby="editFasilitas" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="text-align: center">
                                                <p class="modal-title"><strong>Edit Fasilitas</strong></p>
                                            </div>
                                            <div class="modal-body" style="text-align: left">
                                                <form class="user" action="/facility/{{$fasilitas->id}}/edit" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <p style="font-size: 12px"><strong>Nama Fasilitas</strong></p>
                                                        <input name="edit_namafasilitas" class="form-control form-control-user" placeholder="Nama" value="{{$fasilitas->nama_fasilitas}}" type="text"
                                                        style="font-size:.8rem;border-radius:10rem;padding:1rem 1rem">
                                                        @if ($errors->has('reg_password')) <p class="help-block" style="font-size: 11px; color: #FF0000; margin-left: 4px">{{ $errors->first('reg_password') }}<p> @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <p style="font-size: 12px"><strong>Harga</strong></p>
                                                        <input name="edit_harga" class="form-control form-control-user" placeholder="Nama" value="{{$fasilitas->harga}}" type="text"
                                                        style="font-size:.8rem;border-radius:10rem;padding:1rem 1rem">
                                                        @if ($errors->has('reg_password')) <p class="help-block" style="font-size: 11px; color: #FF0000; margin-left: 4px">{{ $errors->first('reg_password') }}<p> @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <p style="font-size: 12px"><strong>Jumlah</strong></p>
                                                        <input name="edit_jumlah" class="form-control form-control-user" placeholder="Nama" value="{{$fasilitas->jumlah}}" type="text"
                                                        style="font-size:.8rem;border-radius:10rem;padding:1rem 1rem">
                                                        @if ($errors->has('reg_password')) <p class="help-block" style="font-size: 11px; color: #FF0000; margin-left: 4px">{{ $errors->first('reg_password') }}<p> @endif
                                                    </div>
                                                    <hr>
                                                    <div style="text-align: right">
                                                        <button type="submit" class="btn btn-warning btn-user btn-sm" style="border-radius:10rem">Save Changes</button>
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
                                                <p class="modal-title"><strong>Hapus Fasilitas</strong></p>
                                            </div>
                                            <div class="modal-body" style="text-align: left">
                                                <form class="user" action="/facility/{{$fasilitas->id}}/hapus" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body" style="text-align: center">
                                                        <p><strong>Yakin hapus fasilitas {{$fasilitas->nama_fasilitas}} ?</strong></p>
                                                    </div>
                                                    <div style="text-align: center;">
                                                        <button type="submit" class="btn btn-user btn-sm btn-warning" style="width: 100px; border-radius:10rem" >Ya</button>
                                                        <button type="button" class="btn btn-sm btn-user btn-primary" style="width: 100px; border-radius:10rem" data-dismiss="modal" >Tidak</button>
                                                    </div>
                                                </form>
                                            </div>
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
                                        <p class="modal-title"><strong>Tambah Fasilitas</strong></p>
                                    </div>
                                    <div class="modal-body" style="text-align: left">
                                        <form class="user" action="/facility/create" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <p style="font-size: 12px"><strong>Nama Fasilitas</strong></p>
                                                <input name="create_namafasilitas" class="form-control form-control-user" placeholder="Nama Fasilitas" type="text">
                                                @if ($errors->has('create_namafasilitas')) <p class="help-block" style="font-size: 11px; color: #FF0000; margin-left: 4px">{{ $errors->first('create_namafasilitas') }}<p> @endif
                                            </div>
                                            <div class="form-group">
                                                <p style="font-size: 12px"><strong>Harga</strong></p>
                                                <input name="create_harga" class="form-control form-control-user" placeholder="Harga" type="text">
                                                @if ($errors->has('create_harga')) <p class="help-block" style="font-size: 11px; color: #FF0000; margin-left: 4px">{{ $errors->first('create_harga') }}<p> @endif
                                            </div>
                                            <div class="form-group">
                                                <p style="font-size: 12px"><strong>Jumlah</strong></p>
                                                <input name="create_jumlah" class="form-control form-control-user" placeholder="Jumlah" type="text">
                                                @if ($errors->has('create_jumlah')) <p class="help-block" style="font-size: 11px; color: #FF0000; margin-left: 4px">{{ $errors->first('create_jumlah') }}<p> @endif
                                            </div>
                                            <hr>
                                            <div style="text-align: right">
                                                <button type="submit" class="btn btn-sm btn-user btn-warning" style="width: 100px">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
						    </div>
                        </div>
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