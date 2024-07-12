<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="http://127.0.0.1:8000/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIMLAB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 749px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::user()->avatar)
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
                @else
                    <i class="fas fa-user-circle fa-2x"></i>
                @endif
            </div>
            <div class="info d-flex flex-column justify-content-center ms-3">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                <!-- Ganti 'name' dengan kolom lain dari tabel users yang ingin Anda tampilkan -->
            </div>
        </div>






      {{-- <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item"><div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div><div class="search-path"></div></a></div></div>
      </div> --}}
      <li class="nav-header">DATA MASTER</li>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/dashboard" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">DATA MASTER</li>
            <li class="nav-item">
                <a href="/admin/transaksi" class="nav-link">
                    <i class="nav-icon fas fa-exchange-alt"></i>
                    <p>
                        Transaksi
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/kategoribarang" class="nav-link">
                    <i class="nav-icon fas fa-archive"></i>
                    <p>
                        Kategori Barang
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/kategoriberita" class="nav-link">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>
                        Kategori Berita
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="pages/kanban.html" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Data User
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Pengguna
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/mahasiswa" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Mahasiswa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/staff" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Staff</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/dosen" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dosen</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-header">PAGE</li>

            <li class="nav-item">
                <a href="/admin/barang" class="nav-link">
                    <i class="nav-icon fas fa-box"></i>
                    <p>
                        Barang
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/prodi" class="nav-link">
                    <i class="nav-icon fas fa-user-graduate"></i>
                    <p>
                        Program Studi
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Profile
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 55.1876%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
</aside>
