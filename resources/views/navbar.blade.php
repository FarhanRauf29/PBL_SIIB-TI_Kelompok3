<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container px-5">
        <img class="h-9" href="{{ url('/') }}" src="{{ asset('img/rsz_1logo-with-text.jpg') }}"/>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/tentang') }}">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Berita</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                        <li><a class="dropdown-item" href="{{ url('/berita') }}">Beranda Berita</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Lainnya</a>
                    @if (Route::has('login'))
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                            @auth
                                <li><a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a></li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                @if (Route::has('register'))
                                    <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endauth
                        </ul>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>