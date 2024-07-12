@extends('admin-template.full')

@section('main')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 text-gray-900">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="mb-0">List Transaksi</h1>
                    <div>
                        <a href="{{ route('admin/transaksi/createj') }}" class="btn btn-primary">Peminjaman</a>
                        <a href="{{ route('admin/transaksi/createk') }}" class="btn btn-primary">Pengembalian</a>
                    </div>
                </div>
                <hr />
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif
                <table class="table table-hover" id="transaksi_table">
                    <thead class="table-primary">
                        <tr>
                            <th>No.</th>
                            <th>Barang</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($transaksis as $item)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $item->barang->nama }}</td>
                                <td class="align-middle">{{ ($item->status) ? 'Dipinjam' : 'Dikembalikan' }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/admin/transaksishow/{{ $item->id }}" class="btn btn-info">Detail</a>
                                        <a href="{{ route('admin/transaksi/edit', ['id'=>$item->id]) }}" type="button" class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('admin/transaksi/delete', ['id'=>$item->id]) }}" type="button" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="8">transaksi not found</td>
                            </tr>
                            @endforelse
                        </tbody>
                </table>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
           <!--  <script>
                $(document).ready(function () {
                    $('#transaksi_table').DataTable({
                        "processing": false,
                        "serverSide": true,
                        "ajax": "{{ url('/admin/transaksi') }}",
                        "columns": [
                            { "data": "id", "name": "id" },
                            { "data": "user.name", "name": "user.name" },
                            { "data": "barang.nama", "name": "barang.nama" },
                            {
                                "data": "barang.barcode",
                                "name": "barang.barcode",
                                "render": function(data) {
                                    return `<div>${data}</div><div>${DNS1D.getBarcodeHTML(data, 'UPCA', 2, 50)}</div>`;
                                }
                            },
                            { "data": "tgl_pinjam", "name": "tgl_pinjam" },
                            { "data": "tgl_kembali", "name": "tgl_kembali" },
                            { "data": "status", "name": "status" },
                            { "data": "catatan", "name": "catatan" },
                            {
                                "data": "id",
                                "name": "action",
                                "orderable": false,
                                "searchable": false,
                                "render": function (data, type, row, meta) {
                                    return `
                                    <div class="dropdown">
                                        <a href="#" class="icon dropdown-toggle" id="actionDropdown${data}" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ion-ios-more"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${data}">
                                            <li><a class="dropdown-item" href="{{ url('/admin/transaksi/edit/${data}') }}"><i class="ion-edit"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/admin/transaksi/delete/${data}') }}"><i class="ion-trash-a"></i> Delete</a></li>
                                            <li><a class="dropdown-item" href="{{ url('admin/transaksi/print_pdf/${data}') }}"><i class="ion-document"></i> Cetak PDF</a></li>
                                        </ul>
                                    </div>
                                    `;
                                }
                            }
                        ]
                    });
                    // Re-initialize Bootstrap dropdowns after DataTable draw
                    $('#mahasiswa_table').on('draw.dt', function() {
                        $('[data-bs-toggle="dropdown"]').dropdown();
                    });

                    // Add event listener for closing dropdown
                    $(document).on('click', function(e) {
                        if (!$(e.target).closest('.dropdown-toggle').length) {
                            $('.dropdown-menu').removeClass('show');
                        }
                    });

                    $(document).on('click', '.dropdown-toggle', function(e) {
                        var $el = $(this).next('.dropdown-menu');
                        $('.dropdown-menu').not($el).removeClass('show');
                        $el.toggleClass('show');
                    });
                });
            </script> -->



        </div>
    </div>
</div>
@endsection
