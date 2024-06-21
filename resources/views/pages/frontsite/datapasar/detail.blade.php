@extends('layout.main')

@section('title', 'Pasar')

@section('konten')

<div class="container-xxl py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!-- Judul -->
                <h3 class="display-9 mb-2">{{ $datapasar->namapasar }}</h3>
                <span class="fst-italic mb-2">{{ $datapasar->created_at->format('d M Y') }}</span>
                
                <!-- Gambar -->
                <div class="position-relative overflow-hidden mt-3">
                    <img class="img-fluid" src="{{ asset('storage/foto_pasar/' . $datapasar->foto) }}" alt="{{ $datapasar->namapasar }}" style="width: 100%; height: 400px; object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Deskripsi -->
                <div class="testimonial-item text-center">
                    <div class="testimonial-text text-center p-4 mt-5">
                        <p><strong>Alamat:</strong> {{ $datapasar->alamat }}</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-text text-center p-4 mt-3">
                        <p><strong>Jumlah Kios:</strong> {{ $datapasar->jumlah_kios }}</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-text text-center p-4 mt-3">
                        <p><strong>Kecamatan:</strong> {{ $datapasar->kecamatan->nama }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
