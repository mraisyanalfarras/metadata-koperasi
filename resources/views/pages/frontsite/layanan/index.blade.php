@extends('layout.main')

@section('title', 'Layanan Masyarakat')

@section('konten')

<style>

    .card {
        border: 1px solid #ccc;
        border-radius: 8px;
        margin: 10px;
        padding: 15px;
        width: 500px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Layanan Masyarakat</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Layanan Masyarakat</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">

                <p style="text-align: justify;">Kami dengan senang hati mengundang semua warga desa untuk mengajukan surat-surat yang diperlukan melalui layanan pengajuan surat desa kami. Kami siap membantu Anda dalam proses pengurusan dokumen-dokumen penting yang dibutuhkan untuk berbagai keperluan. Jangan ragu untuk memanfaatkan layanan kami, karena kepuasan dan kenyamanan Anda adalah prioritas utama bagi kami.</p>

                <div class="card">
                    <div class="testimonial-item text-center">
                        <div class="testimonial-text text-center p-3">
                            <a href="{{ route('pengajuan-surat.create') }}">
                                <img class="img-fluid mb-3" src="{{ asset('assets/frontsite/img/surat.png') }}"
                                    alt="" style="width: 50%; height: 50%;">
                            </a>
                           <h3>Surat Pengajuan Pengantar</h3>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="testimonial-item text-center">
                        <div class="testimonial-text text-center p-3">
                            <a href="{{ route('aduan-masyarakat.create') }}">
                                <img class="img-fluid mb-3" src="{{ asset('assets/frontsite/img/aduan.png') }}"
                                    alt="" style="width: 50%; height: 50%;">
                            </a>
                           <h3>Aduan Masyarakat Desa</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
