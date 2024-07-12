@extends('admin-template.full')
@section('main')
<div class="pagetitle">
    <h1>Create Pengembalian</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item">Pengembalian</li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin/transaksi/savek') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User</label>
                            <select id="user_id" name="id_user" class="form-control">
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="barang_id" class="form-label">Barang</label>
                            <select id="barang_id" name="barang_id" class="form-control">
                                <option value="">Select Barang</option>
                                @foreach($barangs as $barang)
                                    <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Batas Waktu</label>
                            <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="{{ old('tgl_pinjam') }}" required>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="">Select Status</option>
                                <option value="sedang dipinjam">Sedang Dipinjam</option>
                                <option value="sudah dikembalikan">Sudah Dikembalikan</option>
                                <option value="belum dikembalikan">Belum Dikembalikan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan">{{ old('catatan') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
