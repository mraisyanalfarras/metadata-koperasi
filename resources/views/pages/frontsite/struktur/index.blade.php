@extends('layout.main')

@section('title', 'Struktur')

@section('konten')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $struktur->judul }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Struktur</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
    
                    <!-- Gambar -->
                    <div class="position-relative overflow-hidden text-center">
                        <img src="{{ asset('img_struktur/' . basename($struktur->foto)) }}" alt=""
                            class="img-fluid mb-4">
                    </div>
    
                </div>
            </div>
        </div>
    </div>    

@endsection
