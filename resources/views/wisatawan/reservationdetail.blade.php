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
          <div class="row">
            <div class="col-md-6 text-gray-800">
              <div class="ml-4">
                <p><strong>Nama Pemesan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp; {{$detail->nama_pemesan}}</strong></p>
                <p><strong>Email Pemesan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp; {{$detail->email_pemesan}}</strong></p>
                <p><strong>Nomor Pemesan &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp; {{$detail->no_pemesan}}</strong></p>
              </div>
            </div>   
            <div class="col-md-6 text-justify text-gray-800">
              <div class="ml-4">
                <p><strong>Tanggal Kedatangan &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp; {{ date("d F Y", strtotime($detail->tgl_datang)) }}</strong></p>
                <p><strong>Tanggal Kepulangan &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp; {{ date("d F Y", strtotime($detail->tgl_pulang)) }}</strong></p>
                <p><strong>Durasi Kemah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;
                <?php 
                  $dtg = new DateTime($detail->tgl_datang);
                  $plg =new DateTime($detail->tgl_pulang);
                  $diff = $dtg->diff($plg);
                  echo $diff->d; echo " Hari";
                ?></strong></p>
              </div>
            </div>   
          </div>
          @endforeach
          <br>
          <div class="ml-4 text-gray-800">
            <p><strong>Apakah anda ingin menambah fasilitas?</strong></p>
          </div>
          <div class="col-md-12 mt-3">
            <form action="{{ route('save', ['id' => $detail->id]) }}" method="post">
            {{ csrf_field() }}
            <div class="row" >
              <div class="col-lg-5" style="text-align: center">
              <input type="hidden" name="_method" value="PUT" class="form-control">
              <select name="fasilitas_id" class="form-control">
                <option value="">Pilih Fasilitas</option>
                  @foreach ($fasilitas as $fasilitas)
                    <option value="{{ $fasilitas->id }}">{{ $fasilitas->nama_fasilitas }}</option>
                  @endforeach
              </select>
              </div>
              <div class="col-lg-5" style="text-align: center">
                <input type="number" min="1" value="1" name="qty" class="form-control" required>
              </div>
              <div class="col-lg-2" style="text-align: center">
                <button class="btn btn-warning btn-sm">Tambahkan</button>
              </div>
            </div>
            <br>
            </form>
              <table class="table table-bordered" style="text-align: center">
                <thead class="text-center">
                  <tr class="text-gray-800">
                    <td><strong>#</strong></td>
                    <td><strong>Fasilitas</strong></td>
                    <td><strong>Qty</strong></td>
                    <td><strong>Harga</strong></td>
                    <td><strong>Subtotal</strong></td>
                    <th><strong>Action</strong></th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1 @endphp
                  @foreach ($detail->detail as $detailFas)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $detailFas->fasilitas->nama_fasilitas }}</td>
                    <td>{{ $detailFas->qty }}</td>
                    <td>Rp {{ number_format($detailFas->harga) }}</td>
                    <td>Rp {{ $detailFas->subtotal }}</td>
                    <td>
                      <form action="{{ route('delete', ['id' => $detail->id]) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" class="form-control">
                        <button type="submit" class="btn btn-warning btn-sm">Hapus</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            <p style="font-size: 11px; float: right">Tenda memiliki kapasitas 4 orang!</p><br>
          </div>
          <div class="col-md-4 offset-md-8">
              <table class="table table-hover table-bordered">
                <tr>
                  <td>Total</td>
                  <td>: Rp {{ number_format($detail->total_bayar) }}</td>
                </tr>
              </table>
              <form class="user" action="{{ route('checkout', ['id' => $detail->id]) }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-warning btn-user btn-block mt-10" style="width: 150px;">Book</button>
              </form>
              <!-- <a class="btn btn-warning btn-md" style="float: right" href="/pembayaran">Book</a> -->
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
