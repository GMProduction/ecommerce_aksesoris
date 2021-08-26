<!DOCTYPE html>
<html>
<head>
    <title>Accesorries</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/gambar.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/shimer.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet"/>
</head>
<body>
<h3>{{ $title }}</h3>
<p>No. Pesanan : {{ $data['id'] }}</p>
<table class="table">
    <thead>
    <tr>
        <td>#</td>
        <td>Produk</td>
        <td>Keterangan</td>
        <td>Harga Satuan</td>
        <td>Qty</td>
        <td>Total Harga</td>
    </tr>
    </thead>
    <tbody>
    @foreach($data['getKeranjang'] as $key => $d)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$d->getProduk->nama_produk}}</td>
            <td>{{$d->keterangan}}</td>
            <td>{{number_format($d->getProduk->harga,0)}}</td>
            <td>{{$d->qty}}</td>
            <td>{{number_format($d->total_harga,0)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<h3>Status : {{$status}}</h3>
<p>Thank you</p>

<script src="{{ asset('bootstrap/js/jquery.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/myStyle.js') }}"></script>
</body>
</html>
