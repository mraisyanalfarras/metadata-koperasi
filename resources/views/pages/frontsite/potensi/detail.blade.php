@extends('layout.main')

@section('title', 'Potensi Desa')

@section('konten')
    
<div class="container-xxl py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!-- Judul -->
                <h3 class="display-9 mb-2">{{ $potensi->judul }}</h3>
                <span class="fst-italic mb-2">{{ $potensi->created_at }}</span>
                
                <!-- Gambar -->
                <div class="position-relative overflow-hidden">
                    <a href="{{ route('potensi-desa.show', $potensi->id) }}">
                        <img class="img-fluid" src="{{ asset('storage/foto_potensi/' . $potensi->foto) }}" alt=""
                            style="width: 100%; height: 400px;">
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Deskripsi -->
                <div class="testimonial-item text-center">
                    <div class="testimonial-text text-center p-4 mt-5">
                        <p style="text-align: justify;">{!! $potensi->deskripsi !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
