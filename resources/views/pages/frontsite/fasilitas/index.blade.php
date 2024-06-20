@extends('layout.main')

@section('title', 'Fasilitas Desa')

@section('konten')


    <style>
        .service-item p {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Fasilitas Desa</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Fasilitas</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">

                @foreach ($fasilitas as $item)
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item">
                            <div class="overflow-hidden">
                                <a href="{{ route('fasilitas-desa.show', $item->id) }}">
                                <img class="img-fluid" src="{{ asset('storage/foto_fasilitas/' . $item->foto) }}"
                                    alt="" style="width: 450px;  height: 280px;">
                                </a>
                            </div>
                            <div class="p-4 text-center border border-5 border-light border-top-0">
                                <h4 class="mb-3">{{ $item->judul }}</h4>
                                <p>{!! $item->deskripsi !!}</p>
                                <a class="fw-medium" href="{{ route('fasilitas-desa.show', $item->id) }}">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
