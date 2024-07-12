@extends('admin-template.full')
@section('main')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Edit Kategori Berita</h1>
                    <hr />
                    <p><a href="{{ route('admin/kategoriberita') }}" class="btn btn-primary">Go Back</a></p>

                    <form action="{{ route('admin/kategoriberita/update', $kategori_beritas->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-lg-12">
                            <div class="block">
                              <div class="title"><strong></strong></div>
                              <div class="block-body">
                                <form class="form-horizontal">
                                  <div class="form-group row mb-3">
                                      <label class="col-sm-3 form-control-label">Nama Kategori</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_kategori" value="{{$kategori_beritas->nama_kategori}}">
                                        @error('nama_kategori')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                      </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                      <label class="col-sm-3 form-control-label">Keterangan</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" name="keterangan" value="{{$kategori_beritas->keterangan}}">
                                        @error('keterangan')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                      </div>
                                    </div>

                                      <div class="line"></div>
                                      <div class="form-group row">
                                        <div class="col-sm-9 ml-auto">
                                          <button type="cancel" class="btn btn-secondary">Cancel</button>
                                          <button type="submit" class="btn btn-warning">Update</button>
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
