<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Dosen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Edit Dosen</h1>
                    <hr />
                    <p><a href="{{ route('admin/dosen') }}" class="btn btn-primary">Go Back</a></p>

                    <form action="{{ route('admin/dosen/update', $dosens->id) }}" method="POST">


                    @csrf
                        @method('PUT')
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
                                        <label class="col-sm-3 form-control-label">Jabatan</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" name="bagian">
                                          @error('jabatan')
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
