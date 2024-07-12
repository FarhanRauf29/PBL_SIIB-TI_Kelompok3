@extends('admin-template.full')
@section('main')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Add Berita</h1>
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
                    <p><a href="{{ route('admin/berita') }}" class="btn btn-primary">Go Back</a></p>

                    <form action="{{ route('admin/berita/save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12">
                            <div class="block">
                              <div class="title"><strong></strong></div>
                              <div class="block-body">
                                <form class="form-horizontal">
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-3 form-control-label">Judul Berita</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" name="judul">
                                          @error('judul')
                                          <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                      </div>

                                      <div class="mb-3">
                                        <label for="kategori_id" class="form-label">Kategori</label>
                                        <select class="form-control" name="kategori" required>
                                            @foreach($kategori_beritas as $kategori_berita)
                                                <option value="{{ $kategoriberita->id }}" {{ isset($berita) && $berita->kategori == $kategoriberita->id ? 'selected' : '' }}>
                                                    {{ $kategoriberita->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                      </div>

                                      <div class="form-group row mb-3">
                                        <label class="col-sm-3 form-control-label">Isi Berita</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" name="isi">
                                          @error('isi')
                                          <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                      </div>

                                      <div class="line"></div>
                                      <div class="form-group row">
                                        <div class="col-sm-9 ml-auto">
                                          <button type="cancel" class="btn btn-secondary">Cancel</button>
                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                      </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
