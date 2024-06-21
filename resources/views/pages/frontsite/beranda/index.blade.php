@extends('layout.main')

@section('title', 'Beranda')

@section('konten')

<style>
    .testimonial-text p {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;  
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .owl-carousel-item img {
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }
</style>

    <div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('assets/frontsite/img/b agung.jpg') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Welcome To Website</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">{{ $identitas->nama_desa }}</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Salam hangat dari Dinas Koperasi! Selamat
                                    datang di portal online kami yang menampilkan Data pasar,umkm,industri dan data koperasi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('assets/frontsite/img/pak-juhana.jpg') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Welcome To Website</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">{{ $identitas->nama_desa }}</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Salam hangat dari Dinas Koperasi! Selamat
                                    datang di portal online kami yang menampilkan Data pasar,umkm,industri dan data koperasi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('assets/frontsite/img/pigura.png') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Welcome To Website</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">{{ $identitas->nama_desa }}</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Salam hangat dari Dinas Koperasi! Selamat
                                    datang di portal online kami yang menampilkan Data pasar,umkm,industri dan data koperasi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Geografis Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100"
                            src="{{ asset('img_geografis/' . basename($geografis->foto)) }}" style="object-fit: cover;"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">{{ $geografis->judul }}</h1>
                        </div>
                        <p class="mb-4 pb-2">{!! $geografis->deskripsi !!} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Geografis End -->

    <!-- VisiMisi Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">

                <div class="col-lg-4 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="text-start">
                            <h1 class="mb-4">{{ $visi->judul }}</h1>
                        </div>
                        <p class="mb-4 pb-2">{!! $visi->deskripsi !!} </p>
                    </div>
                </div>

                <div class="col-lg-4 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="text-start">
                            <h1 class="mb-4">{{ $motto->judul }}</h1>
                        </div>
                        <p class="mb-4 pb-2">{!! $motto->deskripsi !!} </p>
                    </div>
                </div>

                <div class="col-lg-4 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="text-start">
                            <h1 class="mb-4">{{ $sejarah->judul }}</h1>
                        </div>
                        <p class="mb-4 pb-2">{!! $sejarah->deskripsi !!} </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- VisiMisi End -->

    <!-- Berita Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Data Pasar</h1>
            </div>

            <div class="row g-4 portfolio-container">

                @foreach ($berita as $item)
                <div class="col-lg-4 col-md-3 col-sm-5 portfolio-item wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <a href="{{ route('berita-desa.show', $item->id) }}">
                            <img class="img-fluid" src="{{ asset('storage/foto_berita/' . $item->foto) }}"
                                alt="" style="width: 100%; height: 200px;">
                            </a>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2">{{ $item->created_at }}</p>
                            <h5 class="lh-base mb-0">{{ $item->judul }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Projects End -->

    <!-- Pengumuman Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Pengumuman</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">

                @foreach ($pengumuman as $item)
                    <div class="testimonial-item text-center">
                        <div class="testimonial-text text-center p-4">
                            <h5 class="mb-1">{{ $item->judul }}</h5>
                            <p>{!! $item->deskripsi !!}</p>
                            <span class="fst-italic">{{ $item->created_at }}</span>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Pengumuman End -->

@endsection
