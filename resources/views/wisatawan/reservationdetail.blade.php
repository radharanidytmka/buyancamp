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
	<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
	<div id="wrapper" >
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
          @foreach($reservasi as $detail)
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><strong>Detail Reservasi #TBC{{$detail->id}}</strong></h1>
          </div>
          <hr>
          <br>
          <div class="row text-center">
            <div class="col-md-2 text-justify text-gray-800">
              <div class="ml-4">
                <p><strong>Nama Pemesan</strong></p>
                <p><strong>Email Pemesan</strong></p>
                <p><strong>Nomor Pemesan</strong></p>
              </div>
            </div>    
            <div class="col-md-1 text-right text-gray-800">
              <p><strong>:</strong></p>
              <p><strong>:</strong></p>
              <p><strong>:</strong></p>
            </div>
            <div class="col-md-3 text-left text-gray-800">
              <div class="ml-4 mr-4" >
                <p><strong>{{$detail->nama_pemesan}}</strong></p>
                <p><strong>{{$detail->email_pemesan}}</strong></p>
                <p><strong>{{$detail->no_pemesan}}</strong></p>
              </div>
            </div> 
            <div class="col-md-2 text-justify text-gray-800">
              <div class="ml-4">
                <p><strong>Tanggal Kedatangan</strong></p>
                <p><strong>Tanggal Kepulangan</strong></p>
                <p><strong>Durasi Kemah</strong></p>
              </div>
            </div>    
            <div class="col-md-1 text-right text-gray-800">
              <p><strong>:</strong></p>
              <p><strong>:</strong></p>
              <p><strong>:</strong></p>
            </div>
            <div class="col-md-3 text-left text-gray-800">
              <div class="ml-4 mr-4" >
                <p><strong>{{ date("d F Y", strtotime($detail->tgl_datang)) }}</strong></p>
                <p><strong>{{ date("d F Y", strtotime($detail->tgl_pulang)) }}</strong></p>
                <p><strong>
                <?php 
                  $dtg = new DateTime($detail->tgl_datang);
                  $plg =new DateTime($detail->tgl_pulang);
                  $diff = $dtg->diff($plg);
                  echo $diff->d; echo " Hari";
                ?>
                </strong></p>
              </div>
            </div> 
          </div>
          @endforeach
          <br>
          <div class="ml-4 text-gray-800">
            <p><strong>Apakah anda ingin menambah fasilitas?</strong></p>
          </div>
          <div class="col-md-12 mt-3">
            <form method="post">
              <table class="table table-bordered" style="text-align: center">
                <thead class="text-center">
                  <tr>
                    <td>#</td>
                    <td>Fasilitas</td>
                    <td>Qty</td>
                    <td>Harga</td>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1 @endphp
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>Tenda</td>
                    <td>1 Buah</td>
                    <td>150.000</td>
                    <td>
                      <form method="post">
                        <input type="hidden" name="_method" value="DELETE" class="form-control">
                        <button class="btn btn-danger btn-sm">Hapus</button>
                      </form>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td></td>
                    <td>
                      <input type="hidden" name="_method" value="PUT" class="form-control">
                      <select name="product_id" class="form-control">
                        <option value="">Pilih Produk</option>
                        @foreach ($fasilitas as $fasilitas)
                          <option value="{{ $fasilitas->id }}">{{ $fasilitas->nama_fasilitas }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <input type="number" min="1" value="1" name="qty" class="form-control" required>
                    </td>
                    <td>
                      info harga
                    </td>
                    <td>
                      <button class="btn btn-primary btn-sm">Tambahkan</button>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </form>
          </div>
          <div class="col-md-4 offset-md-8">
            <table class="table table-hover table-bordered">
              <tr>
                <td>Sub Total</td>
                <td>:</td>
              </tr>
              <tr>
                <td>Total</td>
                <td>:</td>
              </tr>
            </table>
          </div>
        </div>
      </div>       
    </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>
</body>
</html>
