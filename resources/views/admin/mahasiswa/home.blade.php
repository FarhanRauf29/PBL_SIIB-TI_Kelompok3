@extends('admin-template.full')

@section('main')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 text-gray-900">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="mb-0">List mahasiswa</h1>
                    <a href="{{ route('admin/mahasiswa/create') }}" class="btn btn-primary">Add mahasiswa</a>
                </div>
                <hr />
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif
                <table class="table table-hover" id="mahasiswa_table">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Prodi</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>--</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#mahasiswa_table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ url('/admin/mahasiswa') }}",
                        columns: [
                            { data: 'id', name: 'id' },
                            { data: 'nama', name: 'nama' },
                            { data: 'nim', name: 'nim' },
                            { data: 'prodi', name: 'prodi.nama_prodi' },
                            { data: 'email', name: 'email' },
                            { data: 'no_telp', name: 'no_telp' },
                            {
                                data: 'id',
                                name: '--',
                                orderable: false,
                                searchable: false,
                                render: function(data, type, row, meta) {
                                    return `
                                    <div class="dropdown">
                                        <a href="#" class="icon dropdown-toggle" id="actionDropdown${data}" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ion-ios-more"></i> <!-- Menggunakan ikon three-dots dari Bootstrap Icons -->
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${data}">
                                            <li><a class="dropdown-item" href="{{ url('/admin/mahasiswa/edit/${data}') }}"><i class="ion-edit"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/admin/mahasiswa/delete/${data}') }}"><i class="ion-trash-a"></i> Delete</a></li>
                                            <li><a class="dropdown-item" href="{{ url('admin/mahasiswa/print_pdf/${data}') }}"><i class="ion-document"></i> Cetak PDF</a></li>
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
                </script>


        </div>
    </div>
</div>
@endsection
