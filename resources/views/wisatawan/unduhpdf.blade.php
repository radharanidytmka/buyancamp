<!doctype html>
<html lang="en">

<head>
	<title>Tepi Buyan Campfire</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/demo.css">
</head>

<body >
<div class="container">
    <div class="text-center" style="background-color: #f8f8f8;">
        <h2><strong>Tepi Buyan Campfire</strong></h2>
    </div>
    <table class="table">
                                <thead> 
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama Pemesan</th>
                                        <th class="text-center">Email Pemesan</th>
                                        <th class="text-center">Tanggal Kedatangan</th>
                                        <th class="text-center">Tanggal Kepulangan</th>
                                        <th class="text-center">Durasi Kemah</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($reservasi as $reservasiadmin)
                                    <tr class="text-center">
                                        <td colspan="2">{{$no++}}</td>
                                        <td>{{$reservasiadmin->nama_pemesan}}</td>
                                        <td>{{$reservasiadmin->email_pemesan}}</td>
                                        <td>{{$reservasiadmin->tgl_datang}}</td>
                                        <td>{{$reservasiadmin->tgl_pulang}}</td>
                                        <td>{{$reservasiadmin->durasi}} Hari</td>
                                        <td><a class="btn btn-warning" data-toggle="modal" data-target="">Check In</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

</div>
        
</body>

</html>



