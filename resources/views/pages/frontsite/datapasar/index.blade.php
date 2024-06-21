@extends('layout.main')

@section('title', 'Pasar')

@section('konten')

<style>
    .border h5 {
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
        <h1 class="display-3 text-white mb-3 animated slideInDown">PASAR</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Data Pasar</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4 portfolio-container">
            @foreach ($datapasar as $item)
                <div class="col-lg-4 col-md-6 portfolio-item wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded overflow-hidden border border-5 border-light">
                        <div class="position-relative overflow-hidden">
                            <a href="{{ route('pasar-dinas.show', $item->id) }}">
                                <img class="img-fluid" src="{{ asset('storage/foto_pasar/' . $item->foto) }}"
                                     alt="{{ $item->namapasar }}" style="width: 100%; height: 200px; object-fit: cover;">
                            </a>
                        </div>
                        <div class="p-4">
                            <h5 class="lh-base mb-2">{{ $item->namapasar }}</h5>
                            <p class="text-primary fw-medium mb-2">{{ $item->created_at->format('d M Y') }}</p>
                            <div class="border-top mt-3 pt-3">
                                <p><strong>Alamat:</strong> {{ $item->alamat }}</p>
                                <p><strong>Kecamatan:</strong> {{ $item->kecamatan->nama }}</p>
                                <p><strong>Jumlah Kios:</strong> {{ $item->jumlah_kios }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
