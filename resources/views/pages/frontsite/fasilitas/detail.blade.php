@extends('layout.main')

@section('title', 'Fasilita Desa')

@section('konten')
    
<div class="container-xxl py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!-- Judul -->
                <h3 class="display-9 mb-2">{{ $fasilitas->judul }}</h3>
                <span class="fst-italic mb-2">{{ $fasilitas->created_at }}</span>
                
                <!-- Gambar -->
                <div class="position-relative overflow-hidden">
                    <a href="{{ route('fasilitas-desa.show', $fasilitas->id) }}">
                        <img class="img-fluid" src="{{ asset('storage/foto_fasilitas/' . $fasilitas->foto) }}" alt=""
                            style="width: 100%; height: 400px;">
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Deskripsi -->
                <div class="testimonial-item text-center">
                    <div class="testimonial-text text-center p-4 mt-5">
                        <p style="text-align: justify;">{!! $fasilitas->deskripsi !!}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 pe-lg-0 mt-5" style="min-height: 300px;">
                <div class="position-relative h-100">
                    <iframe class="position-absolute w-100 h-100" style="object-fit: cover;"
                    src="{{ $fasilitas->maps }}" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
