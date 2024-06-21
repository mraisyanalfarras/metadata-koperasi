<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary">Dinas Koperasi</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('beranda.index') }}" class="nav-item nav-link active">Beranda</a>
            

           



            <a href="{{ route('pasar-dinas.index') }}" class="nav-item nav-link">Data Pasar</a>

            
            <a href="{{ route('kontak-desa.index') }}" class="nav-item nav-link">Kontak</a>
        </div>
        <a href="{{ route('login') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login<i
                class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>