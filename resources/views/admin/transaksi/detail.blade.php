@extends('admin-template.full')

@section('main')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 text-gray-900">
                <div class="d-flex align-items-center justify-content-between">
                    {{-- @dd($item->barang->nama) --}}
                    <h1 class="mb-0">Detail Transaksi {{ $item->barang->nama }}</h1>
                </div>
                <hr />
                <table class="table table-hover" id="transaksi_table">
                    <tr>
                        <th>Nama Barang</th>
                        <td class="align-middle">{{ $item->barang->nama }}</td>
                    </tr>
                    <tr>
                        <th>Peminjam</th>
                        <td class="align-middle">{{ $item->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Penanggung Jawab</th>
                        <td class="align-middle">{{ $item->pen_jwb->name }}</td>
                    </tr>
                    <tr>
                        <th>Batas Waktu Peminjaman</th>
                        <td class="align-middle">{{ $item->batas_waktu }} Hari</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td class="align-middle">{{ ($item->status) ? 'Dipinjam' : 'Dikembalikan' }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pinjam</td>
                        <td class="align-middle">{{ $item->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Kembali</td>
                        <td class="align-middle">{{ ($item->status) ? '-' : $item->updated_at }}</td>
                    </tr>
                    <tr>
                        <td>Feedback</td>
                        <td class="align-middle">{{ ($item->status) ? '-' : $item->feedback }}</td>
                    </tr>
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
