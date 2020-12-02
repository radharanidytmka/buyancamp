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
	<!-- Date Picker -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
</head>

<body id="page-top" >
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
            <h1 class="h3 mb-0 text-gray-800"><strong>Profil</strong></h1>
          </div>
          <hr>
          <br>
          <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body" style="text-align: center">
                    <img src="assets/img/team/1.jpg" class="img-profile rounded-circle" width="200px" alt="Avatar">
                        <hr>
                        <h3><strong>{{auth()->user()->name}}</strong></h3>
                        <p>{{auth()->user()->role}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <button class="btn btn-warning btn-user btn-block " data-toggle="modal" data-target="#editProfile" style="width: 150px; float: right; border-radius:10rem">Edit Profile</button>
                    </div>
                    <div class="card-body">
                    <form class="user">
                            <div class="form-group">
                              <input type="text" class="form-control form-control-user" value="{{auth()->user()->name}}" readonly >
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control form-control-user" value="{{auth()->user()->email}}" readonly >
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control form-control-user" value="{{ date('d F Y', strtotime(auth()->user()->tgllahir)) }}" readonly >
                            </div>
                            <div class="form-group">
								              <input type="text" class="form-control form-control-user" value="{{auth()->user()->no_telepon}}" readonly >
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control form-control-user" value="{{auth()->user()->alamat}}" readonly >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- modal edit -->
    <div id="editProfile" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="float: center">
                    <h4 class="modal-title"><strong>Edit Profile</strong></h4>
                </div>
                <div class="modal-body" >
                    <form class="user" action="/user/{{auth()->user()->id}}/edit" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <input name="edit_nama" class="form-control form-control-user" placeholder="Nama" value="{{auth()->user()->name}}" type="text">
                        </div>
                        <div class="form-group">
                          <input name="edit_email" class="form-control form-control-user" placeholder="Nama" value="{{auth()->user()->email}}" type="text">
                        </div>
                        <div class="form-group">
                          <input name="edit_no" class="form-control form-control-user" placeholder="Nama" value="{{auth()->user()->no_telepon}}" type="text">
                        </div>
                        <div class="form-group">
                          <div class="input-group date" id="tgllahir">
                            <input type="text" name="edit_tgllahir" class="form-control form-control-user input-group-addon" placeholder="Tanggal Lahir" value="{{auth()->user()->tgllahir}}"> 
                          </div>
                        </div>
                        <div class="form-group">
                          <input name="edit_alamat" class="form-control form-control-user" placeholder="Nama" value="{{auth()->user()->alamat}}" type="text">
                        </div>
                        <hr>
                        <div style="text-align: center">
                          <div class="row no-gutters align-items-center"> 
                            <div class="col-md-6">
                              <button type="button" class="btn btn-sm btn-user btn-primary" data-dismiss="modal" style="width: 100px; border-radius:10rem">Cancel</button>
                            </div>
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-warning btn-user btn-block" style="width: 150px">Save Changes</button>
                            </div>
                          </div>
                        </div>
                    </form>
                </div>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#tgllahir').datetimepicker({
				useCurrent: false,
				locale:'id',
				format:'YYYY-MM-DD'
			});
		});
	</script>
</body>

</html>
