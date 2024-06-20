<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary">DESA BUKIT AGUNG</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('beranda.index') }}" class="nav-item nav-link active">Beranda</a>
            

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profil Desa</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="{{ route('struktur-desa.index') }}" class="dropdown-item">Struktur Desa</a>
                    <a href="{{ route('perangkat-desa.index') }}" class="dropdown-item">Perangkat Desa</a>
                    <a href="{{ route('fasilitas-desa.index') }}" class="dropdown-item">Fasilitas Desa</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pemerintahan</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="{{ route('lembaga-desa.index') }}" class="dropdown-item">Lembaga Desa</a>
                </div>
            </div>

            <a href="{{ route('layanan-desa.index') }}" class="nav-item nav-link">Layanan Masyarakat</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Informasi Publik</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="{{ route('berita-desa.index') }}" class="dropdown-item">Berita</a>
                    <a href="{{ route('pengumuman-desa.index') }}" class="dropdown-item">Pengumuman</a>
                    <a href="{{ route('potensi-desa.index') }}" class="dropdown-item">Potensi Desa</a>
                </div>
            </div>

            <a href="{{ route('kontak-desa.index') }}" class="nav-item nav-link">Kontak</a>
        </div>
        <a href="{{ route('login') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login<i
                class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>