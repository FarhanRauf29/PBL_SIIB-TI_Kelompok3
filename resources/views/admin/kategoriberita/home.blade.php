@extends('admin-template.full')
@section('main')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">List Kategori Berita</h1>
                        <a href="{{ route('admin/kategoriberita/create') }}" class="btn btn-primary">Add kategori berita</a>
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
                                <th>Nama Kategori</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kategori_beritas as $kategoriberita)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $kategoriberita->nama_kategori }}</td>
                                <td class="align-middle">{{ $kategoriberita->keterangan }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin/kategoriberita/edit', ['id'=>$kategoriberita->id]) }}" type="button" class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('admin/kategoriberita/delete', ['id'=>$kategoriberita->id]) }}" type="button" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">kategori berita not found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $kategori_beritas->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
