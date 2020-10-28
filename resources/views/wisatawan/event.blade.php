<!doctype html>
<html lang="en">

<head>
<title>Tepi Buyan Campfire</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
          <span>Payment</span></a>

          <a class="nav-link" href="/reservasi">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>Booking Camp</span></a>

          <a class="nav-link" href="/event">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Booking Event</span></a>

          <a class="nav-link" href="/profile">
          <i class="fas fa-fw fa-user-alt"></i>
          <span>Profile</span></a>
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
            <h1 class="h3 mb-0 text-gray-800"><strong>Booking Event</strong></h1>
          </div>
          <hr>
          <br>
          <div class="row text-center">
            <div class="col-md-12" style="text-align: justify">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>    
          </div>
          <br>
          <div class="row" >
            <div class="col-lg-6">
                <form class="user" action="/user/create" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input name="reg_nama" type="text" class="form-control form-control-user" id="register-nama" placeholder="Nama">
                              </div>
                    <div class="form-group">
                      <input name="reg_email" type="email" class="form-control form-control-user" id="register-email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input name="reg_no" type="text" class="form-control form-control-user" id="register-no" placeholder="Subject">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user datepicker" id="date" name="reg_tgllahir" placeholder="Message">
                    </div><br>
                  <button type="submit" class="btn btn-warning btn-user btn-block" style="">SUBMIT MESSAGE</button>
                </form>
            </div>
            <div class="col-lg-6" style="text-align: center">
            <br>
                <h2 ><strong>CONTACT US!</strong></h2>
                <br>
                <a class="btn btn-success" style="width: 300px" href="https://wa.me/628112777135?text=Halo admin, saya mau tanya">Chat Via WhatsApp</a>
                <br><br>
                <a class="btn btn-danger " style="width: 300px" href="https://www.instagram.com/tepibuyancampfire/">Chat Via Instagram</a>
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
</body>
</html>
