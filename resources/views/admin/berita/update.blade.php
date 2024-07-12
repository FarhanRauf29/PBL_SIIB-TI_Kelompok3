@extends('admin-template.full')
@section('main')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Edit Berita</h1>
                    <hr />
                    <p><a href="{{ route('admin/berita') }}" class="btn btn-primary">Go Back</a></p>

                    <form action="{{ route('admin/berita/update', $beritas->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-lg-12">
                            <div class="block">
                              <div class="title"><strong></strong></div>
                              <div class="block-body">
                                <form class="form-horizontal">
                                  <div class="form-group row mb-3">
                                      <label class="col-sm-3 form-control-label">Judul Berita</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" name="judul" value="{{$beritas->judul}}">
                                        @error('judul')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                      </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                      <label class="col-sm-3 form-control-label">Isi Berita</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" name="isi" value="{{$beritas->isi}}">
                                        @error('isi')
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
</x-app-layout>
@endsection
