@extends('admin-template.full')
@section('main')
<div class="pagetitle">
    <h1>Create Peminjaman</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item">Peminjaman</li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin/transaksi/savej') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="id_user" class="form-label">User</label>
                            <select id="id_user" name="id_user" class="form-control">
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_pen_jwb" class="form-label">Penanggung Jawab</label>
                            <select id="id_pen_jwb" name="id_pen_jwb" class="form-control">
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
                            <input type="number" class="form-control" id="batas_waktu" name="batas_waktu" value="{{ old('batas_waktu') }}" placeholder="Dalam hari" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userSelect = document.getElementById('id_user');
            const penJwbSelect = document.getElementById('id_pen_jwb');
            const penJwbOptions = Array.from(penJwbSelect.options);

            userSelect.addEventListener('change', function() {
                const selectedUserId = userSelect.value;

                // Clear current Penanggung Jawab options
                penJwbSelect.innerHTML = '';

                // Re-add options, including the empty value, and excluding the selected user if not empty
                penJwbOptions.forEach(option => {
                    if (selectedUserId === "" || option.value !== selectedUserId) {
                        penJwbSelect.appendChild(option);
                    }
                });
            });
        });
    </script>

</section>
@endsection
