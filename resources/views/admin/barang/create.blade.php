@extends('admin-template.full')
@section('main')



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Add Barang</h1>
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
                    <p><a href="{{ route('admin/barang') }}" class="btn btn-primary">Go Back</a></p>

                    <form action="{{ route('admin/barang/save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12">
                            <div class="block">
                              <div class="title"><strong></strong></div>
                              <div class="block-body">
                                <form class="form-horizontal">
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-3 form-control-label">Nama Barang</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" name="nama">
                                          @error('nama')
                                          <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                      </div>

                                      <div class="form-group row mb-3">
                                        <label class="col-sm-3 form-control-label">Jenis</label>
                                            <div class="col-sm-9">
                                                <select name="jenis_id" class="form-control mb-3 mb-3">
                                                    <option value="-" class=""></option>
                                                    @foreach ($ktg as $brg)
                                                        <option value="{{ $brg->id }}">{{ $brg->nama_kategori }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                      </div>

                                      <div class="form-group row mb-3">
                                        <label class="col-sm-3 form-control-label">Stok</label>
                                        <div class="col-sm-9">
                                          <input type="number" class="form-control" name="stok">
                                          @error('stok')
                                          <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                      </div>

                                      <div class="form-group row mb-3">
                                        <label class="col-sm-3 form-control-label">Status</label>
                                        <div class="col-sm-9">
                                            <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required>
                                                <option value="">Pilih Status</option>
                                                <option value="Masuk" {{ old('status') == 'Masuk' ? 'selected' : '' }}>Masuk</option>
                                                <option value="Keluar" {{ old('status') == 'Keluar' ? 'selected' : '' }}>Keluar</option>
                                            </select>
                                            @error('status')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                      </div>

                                      <div class="line"></div>
                                      <div class="form-group row">
                                        <div class="col-sm-9 ml-auto">
                                          <button type="cancel" class="btn btn-secondary">Cancel</button>
                                          <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
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
