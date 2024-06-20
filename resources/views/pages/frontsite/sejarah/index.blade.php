@extends('layout.main')

@section('title', 'Sejarah')

@section('konten')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $sejarah->judul }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Sejarah</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">


                    <!-- Gambar -->
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('img_sejarah/' . basename($sejarah->foto)) }}" alt=""
                            class="img-fluid mb-4" width="100%" height="100px">
                    </div>

                    <!-- Deskripsi -->
                    <div class="testimonial-text">
                        <p style="font-size: 30px;">{!! $sejarah->deskripsi !!}</p>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>

@endsection
