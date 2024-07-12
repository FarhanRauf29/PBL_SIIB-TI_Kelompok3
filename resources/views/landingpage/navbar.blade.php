<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="/">Inventory System</a></h1>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="/dashboard">Dashboard</a></li>
                <li><a class="nav-link scrollto" href="/user/barang">Barang</a></li>
                <li><a class="nav-link scrollto" href="/peminjaman">Peminjaman</a></li>
                <li><a class="nav-link scrollto" href="/riwayat-peminjaman">Riwayat Peminjaman</a></li>
                <li><a class="nav-link scrollto" href="/aktifitas">Aktifitas Terkini</a></li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <i class="ri-account-pin-circle-line" style="font-size: 24px;"></i>
                        <span class="d-none d-md-block ps-2">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="users-profile.html">
                                <i class="bi bi-person me-2" style="font-size: 24px;"></i> My Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="users-profile.html">
                                <i class="bi bi-gear me-2" style="font-size: 24px;"></i> Account Settings
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="pages-faq.html">
                                <i class="bi bi-question-circle me-2" style="font-size: 24px;"></i> Need Help?
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-2" style="font-size: 24px;"></i> Sign Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->
