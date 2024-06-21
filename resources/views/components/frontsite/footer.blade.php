<div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Address</h4>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ $identitas->no_hp }}</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ $identitas->email }}</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Menu</h4>
                <a class="btn btn-link" href="{{ route('visi-misi.index') }}">Visi Misi</a>
                <a class="btn btn-link" href="{{ route('geografis-desa.index') }}">Geografis</a>
                <a class="btn btn-link" href="{{ route('layanan-desa.index') }}">Layanan Masyarakat</a>
                <a class="btn btn-link" href="{{ route('pengumuman-desa.index') }}">Pengumuman</a>
                <a class="btn btn-link" href="{{ route('kontak-desa.index') }}">Kontak</a>
            </div>

            <div class="col-lg-5 col-md-6 footer-newsletter ms-auto" style="color: white;">
                <iframe src="{{ $identitas->maps }}" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>      
            
            
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Dinas Koperasi</a>, All Right Reserved.
                </div>
            </div>
        </div>
    </div>
</div>