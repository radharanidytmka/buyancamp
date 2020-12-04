<!doctype html>
<html lang="en">

<head>
	<title>Tepi Buyan Campfire</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<style>
body{
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    color:#333;
    text-align:left;
    font-size:18px;
    margin:0;
}
.container{
    margin:0 auto;
    margin-top:35px;
    padding:40px;
    width:750px;
    height:auto;
    background-color:#fff;
}
caption{
    font-size:28px;
    margin-bottom:15px;
}
table{
    border:1px solid #333;
    border-collapse:collapse;
    margin:0 auto;
    width:740px;
}
td, tr, th{
    padding:6px;
    border:1px solid #333;
    width:185px;
}
th{
    background-color: #f0f0f0;
}
h4, p{
    margin:0px;
}
</style>
<body >
<div class="container">
    @foreach($reservasi as $unduh)
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <caption>
            Tepi Buyan Campfire
        </caption>
        <br>
        <tbody>
            <tr>
                <th colspan="3">Receipt <strong>TBC#{{ $unduh->id }}</strong></th>
                <th>{{ $unduh->created_at->format('D, d M Y') }}</th>
            </tr>
            <tr>
                <td colspan="2">
                    <p><strong>Nama Pemesan </strong> <br>{{ $unduh->nama_pemesan }}</p>
                    <p><strong>Email Pemesan </strong> <br>{{ $unduh->email_pemesan }}</p>
                    <p><strong>Nomor Pemesan</strong> <br> {{ $unduh->no_pemesan }}</p>
                </td>
                <td colspan="2">
                    <p><strong>Status Pembayaran</strong><br><?php
                        if($unduh->status_pembayaran == 'Menunggu Pembayaran'){
                            echo '<span class="badge-danger btn-sm mr-1"  >Menunggu Pembayaran</span>';
                        } elseif($unduh->status_pembayaran == 'Sudah Dibayar' ){
                            echo '<span class="badge-success btn-sm  mr-1" >Sudah Dibayar</span>';
                        } 
                    ?></p>
                    <p style="text-transform: capitalize;"><strong>Status Konfirmasi</strong><br><?php
                        if($unduh->status_konfirmasi == 'false'){
                            echo '<span class="badge-danger btn-sm  " >Belum Check In</span>';
                        } elseif($unduh->status_konfirmasi == 'true' ){
                            echo '<span class="badge-success btn-sm " ">Sudah Check In</span>';
                        } 
                    ?></p>
                    <p>&nbsp;<br> <strong>&nbsp;</strong></p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p><strong>Tanggal Perkemahan </strong><br>
                    {{ date("d F Y", strtotime($unduh->tgl_datang)) }} - {{ date("d F Y", strtotime($unduh->tgl_pulang)) }}</p>
                    <p><strong>Durasi Kemah</strong> <br><?php 
                        $dtg = new DateTime($unduh->tgl_datang);
                        $plg =new DateTime($unduh->tgl_pulang);
                        $diff = $dtg->diff($plg);
                        echo $diff->d; echo " Hari";
                    ?></p>
                </td>
            </tr>
            <tr>
                <th style="text-align: center">Fasilitas</th>
                <th style="text-align: center">Qty</th>
                <th style="text-align: center">Harga</th>
                <th style="text-align: center">Subtotal</th>
            </tr>
            @php $no = 1 @endphp
            @foreach ($unduh->detail as $detail)
            <tr>
                <td style="text-align: center">{{ $detail->fasilitas->nama_fasilitas }} </td>
                <td style="text-align: center">{{ $detail->qty }} Unit</td>
                <td style="text-align: center">Rp {{ number_format($detail->harga) }}</td>
                <td style="text-align: center">Rp {{ $detail->subtotal }}</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="3" style="text-align: center">Total</th>
                <td style="text-align: center">Rp {{ number_format($unduh->total_bayar) }}</td>
            </tr>
        </tbody>
    </table>
    @endforeach
</div>
</body>
</html>



