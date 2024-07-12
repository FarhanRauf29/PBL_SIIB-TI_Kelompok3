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

        <!-- Dark Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Barcode</th>
                    <th>Stok</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangs as $barang)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $barang->nama }}</td>
                            <td class="align-middle">{{ $barang->kategoribarang->nama_kategori}}</td>
                            <td class="align-middle">{!! DNS1D::getBarcodeHTML("$barang->barcode", 'UPCA',2,50) !!}
                            P - {{ $barang->barcode }}
                            </td>
                            <td class="align-middle">{{ $barang->stok }}</td>
                            <td class="align-middle">{{ $barang->status }}</td>
                            <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('admin/barang/edit', ['id'=>$barang->id]) }}" type="button" class="btn btn-secondary">Edit</a>
                                    <a href="{{ route('admin/barang/delete', ['id'=>$barang->id]) }}" type="button" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="5">barang not found</td>
                        </tr>
                        @endforelse
            </tbody>
        </table>

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="box">
            <h3>Free Plan</h3>
            <h4><sup>$</sup>0<span>per month</span></h4>
            <ul>
              <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
              <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
              <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
              <li class="na"><i class="bx bx-x"></i> <span>Pharetra massa massa ultricies</span></li>
              <li class="na"><i class="bx bx-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
            </ul>
            <a href="#" class="buy-btn">Get Started</a>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
          <div class="box featured">
            <h3>Business Plan</h3>
            <h4><sup>$</sup>29<span>per month</span></h4>
            <ul>
              <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
              <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
              <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
              <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
              <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
            </ul>
            <a href="#" class="buy-btn">Get Started</a>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
          <div class="box">
            <h3>Developer Plan</h3>
            <h4><sup>$</sup>49<span>per month</span></h4>
            <ul>
              <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
              <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
              <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
              <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
              <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
            </ul>
            <a href="#" class="buy-btn">Get Started</a>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Pricing Section -->
@endsection
