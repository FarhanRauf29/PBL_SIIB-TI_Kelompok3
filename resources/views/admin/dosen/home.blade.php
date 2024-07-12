@extends('admin-template.full')

@section('main')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 text-gray-900">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="mb-0">List Dosen</h1>
                    <a href="{{ route('admin/dosen/create') }}" class="btn btn-primary">Add Dosen</a>
                </div>
                <hr />
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif
                <table class="table table-hover" id="dosens_table">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>Nomor Telp</th>
                            <th>Jabatan</th>
                            <th>--</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#dosens_table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ url('/admin/dosen') }}",
                        columns: [
                            { data: 'id', name: 'id' },
                            { data: 'nama', name: 'nama' },
                            { data: 'nip', name: 'nip' },
                            { data: 'email', name: 'email' },
                            { data: 'no_telp', name: 'no_telp' },
                            { data: 'jabatan', name: 'jabatan' },
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
                                            <li><a class="dropdown-item" href="{{ url('/admin/dosen/edit/${data}') }}"><i class="ion-edit"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/admin/dosen/delete/${data}') }}"><i class="ion-trash-a"></i> Delete</a></li>
                                            <li><a class="dropdown-item" href="{{ url('admin/dosen/print_pdf/${data}') }}"><i class="ion-document"></i> Cetak PDF</a></li>
                                        </ul>
                                    </div>

                                    `;
                                }
                            }
                        ]
                    });

                    // Re-initialize Bootstrap dropdowns after DataTable draw
                    $('#dosens_table').on('draw.dt', function() {
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
