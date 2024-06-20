@extends('layout.main')

@section('title', 'Lembaga Desa')

@section('konten')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Lembaga Desa</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Lembaga</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    @foreach ($lembaga as $item)
        <div class="container-xxl py-8">
            <div class="container">
                <div class="row g-4">
                    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
                        <div class="container about px-lg-0">
                            <div class="row g-0 mx-lg-0">
                                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100"
                                            src="{{ asset('storage/foto_lembaga/' . $item->foto) }}"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="p-lg-5 pe-lg-0">
                                        <div class="text-start">
                                            <h1 class="mb-2">{{ $item->judul }}</h1>
                                        </div>
                                        <p class="mb-4 pb-2">{!! $item->deskripsi !!} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
