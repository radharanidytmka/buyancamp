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
    <!-- DATE PICKER -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
</head>

<body id="page-top">
	<div id="wrapper" >
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
            <h1 class="h3 mb-0 text-gray-800"><strong>Booking Kemah</strong></h1>
          </div>
          <hr>
          <br>
          <div class="row text-center">
            <div class="col-md-12" style="text-align: justify">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>    
          </div>
          <br>
          <form class="user" action="/reservasi/create" method="POST">
            {{ csrf_field() }}
            <div class="row" >
              <div class="col-lg-6">
                <div class="form-group">  
                  <label class="ml-2">Nama Pemesan</label>
                  <input name="reservasi_nama" type="text" class="form-control form-control-user" id="register-nama" readonly value="{{auth()->user()->name}}" placeholder="Nama">
                </div>
                <div class="form-group">
                  <label class="ml-2">Email Pemesan</label>
                  <input name="reservasi_email" type="email" class="form-control form-control-user" readonly value="{{auth()->user()->email}}" id="register-email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label class="ml-2">Nomor Pemesan</label>
                  <input name="reservasi_no" type="email" class="form-control form-control-user" readonly value="{{auth()->user()->no_telepon}}" id="register-email" placeholder="Email">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="ml-2">Tanggal Kedatangan</label>
                  <div class="input-group date" id="tgldatang">
                    <input name="reservasi_tgldatang" type="text" class="form-control form-control-user input-group-addon" placeholder="Tanggal Kedatangan"> 
                  </div>
                </div>
                <div class="form-group">
                  <label class="ml-2">Tanggal Kepulangan</label>
                  <div class="input-group date" id="tglpulang">
                    <input name="reservasi_tglpulang" type="text" class="form-control form-control-user input-group-addon" placeholder="Tanggal Kepulangan"> 
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label class="ml-2">Durasi Kemah</label>
                  <input type="text" class="form-control form-control-user datepicker" id="selisih" name="reservasi_durasi" placeholder="Durasi Kemah">
                </div> -->
              </div>
            </div>
            <br>
            <div style="float: right">
              <button type="submit" class="btn btn-warning btn-user btn-block mt-10" style="width: 150px;">Next</button>
              <!-- <p><a href="/reservasi/detail/1">try!</a></p> -->
            </div>
          </form> 
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript">
	$(function(){
		$('#tgldatang').datetimepicker({
      locale:'id',
      format:'YYYY-MM-DD'
    });
    $('#tglpulang').datetimepicker({
      useCurrent: false,
      locale:'id',
      format:'YYYY-MM-DD'
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
    $('#selisih').val(Math.floor(timeDiff/(86400)))   
  }
	</script>  
</body>
</html>
