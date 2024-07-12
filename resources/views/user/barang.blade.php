@extends('landingpage.page')

@section('main')
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing" style="padding-top: 100px;">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Pricing</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
            <div class="col-md-3 mb-3">
                <!-- Input pencarian -->
                <input type="text" id="searchInput" class="form-control" placeholder="Cari barang...">
            </div>

        </div>
            <div class="d-flex align-items-center justify-content-between">
                <a href="#" class="btn btn-primary">Ajukan Peminjaman</a>
            </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Aktifitas</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangs as $barang)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $barang->nama }}</td>
                    <td class="align-middle">{{ $barang->kategoribarang->nama_kategori}}</td>
                    <td class="align-middle">{{ $barang->stok }}</td>
                    <td class="align-middle">
                        <!-- Dropdown untuk Ubah, Hapus, dan Detail -->
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="false">
                                <em class="icon ni ni-more-h"></em>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" style="">
                                <ul class="link-list-opt no-bdr">
                                    <li>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-default" data-result="#modal-default-result" onclick="confirmation(this, '{{ $barang->id }}', 'barang', 'update')">
                                            <em class="icon ni ni-edit"></em> <span> Ubah </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-default" data-result="#modal-default-result" onclick="confirmation(this, '{{ $barang->id }}', 'barang', 'delete')">
                                            <em class="icon ni ni-trash"></em> <span> Hapus </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-default" data-result="#modal-default-result" onclick="confirmation(this, '{{ $barang->id }}', 'barang', 'detail')">
                                            <em class="icon ni ni-zoom-in"></em> <span> Detail </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="5">Barang tidak ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Tombol untuk Pengajuan Peminjaman -->


    </div>
</section><!-- End Pricing Section -->

@endsection
