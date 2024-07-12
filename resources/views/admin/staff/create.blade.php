@extends('admin-template.full')
@section('main')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5 text-gray-900">
                    <h1 class="mb-0">Add Staff</h1>
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
                    <p><a href="{{ route('admin/staff') }}" class="btn btn-primary">Go Back</a></p>

                    <form action="{{ route('admin/staff/save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-8">
                            <div class="block">
                              <div class="title"><strong></strong></div>
                              <div class="block-body">
                                <form class="form-horizontal">
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-3 form-control-label">Nama</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" name="nama">
                                          @error('nama')
                                          <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                      </div>

                                      <div class="form-group row mb-3">
                                        <label class="col-sm-3 form-control-label">NIP</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" name="nip">
                                          @error('nip')
                                          <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                      </div>

                                        <div class="form-group row mb-3">
                                          <label class="col-sm-3 form-control-label">Email</label>
                                          <div class="col-sm-9">
                                            <input type="email" placeholder="@Email" class="form-control" name="email">
                                            @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                          </div>
                                        </div>

                                      <div class="form-group row mb-3">
                                        <label class="col-sm-3 form-control-label">Nomor Telefon</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" name="no_telp">
                                          @error('no_telp')
                                          <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                      </div>

                                      <div class="form-group row mb-3">
                                        <label class="col-sm-3 form-control-label">Bagian</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" name="bagian">
                                          @error('bagian')
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
