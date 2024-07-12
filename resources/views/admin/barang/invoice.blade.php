<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Barang</title>
</head>
<body>
    <h1>Data Barang</h1>
    <h3>Nama Barang : {{ $barangs->nama }}</h3>
    <h3>Kategori Barang : {{ $barangs->kategori }}</h3>
    <h3>Barcode : {!! DNS1D::getBarcodeHTML("$barangs->barcode",'UPCA',2,50) !!}
        p - {{ $barangs->barcode }}</h3>
    <h3>Stok Barang : {{ $barangs->stok }}</h3>
    <h3>Status Barang : {{ $barangs->status }}</h3>
</body>
</html>