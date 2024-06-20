@extends('layout.main')

@section('title', 'Geografis')

@section('konten')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $geografis->judul }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Geografis</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Deskripsi -->
                    <div class="testimonial-text">
                        <p style="font-size: 30px;">{!! $geografis->deskripsi !!}</p>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>   

@endsection
