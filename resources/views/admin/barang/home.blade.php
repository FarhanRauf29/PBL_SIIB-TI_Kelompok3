@extends('admin-template.full')
@section('main')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">List Barang</h1>
                        <a href="{{ route('admin/barang/create') }}" class="btn btn-primary">Add Barang</a>
                    </div>
                    <hr />
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Barcode</th>
                                <th>Stok</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($barangs as $barang)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $barang->nama }}</td>
                                <td class="align-middle">{{ $barang->kategoribarang->nama_kategori}}</td>
                                <td>{!! DNS1D::getBarcodeHTML("$barang->barcode",'UPCA',2,50) !!}
                                    p - {{ $barang->barcode }}
                                <td class="align-middle">{{ $barang->stok }}</td>
                                <td class="align-middle">{{ $barang->status }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin/barang/edit', ['id'=>$barang->id]) }}" type="button" class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('admin/barang/delete', ['id'=>$barang->id]) }}" type="button" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                                        <a href="{{ route('admin/barang/print_pdf', ['id'=>$barang->id]) }}" type="button" class="btn btn-primary">Cetak PDF</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">barang not found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
