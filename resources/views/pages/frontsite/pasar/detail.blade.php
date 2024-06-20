@extends('layout.main')

@section('title', 'Data Pasar')

@section('konten')
    
<div class="container-xxl py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!-- Judul -->
                <h3 class="display-9 mb-2">{{ $datapasar->namapasar }}</h3>
                <span class="fst-italic mb-2">{{ $datapasar->created_at }}</span>
                
                <!-- Gambar -->
                <div class="position-relative overflow-hidden">
                    <a href="{{ route('datapasar.show', $datapasar->id) }}">
                        <img class="img-fluid" src="{{ asset('storage/foto_datapasar/' . $datapaar->foto) }}" alt=""
                            style="width: 100%; height: 400px;">
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Deskripsi -->
                <div class="testimonial-item text-center">
                    <div class="testimonial-text text-center p-4 mt-5">
                        <p style="text-align: justify;">{!! $datapasar->alamat !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
