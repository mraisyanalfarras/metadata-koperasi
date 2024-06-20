@extends('layout.main')

@section('title', 'Pengumuman Desa')

@section('konten')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">

                <h3 class="display-9 mb-2">{{ $pengumuman->judul }}</h3>
                <span class="fst-italic">{{ $pengumuman->created_at }}</span>

                <p style="text-align: justify;">{!! $pengumuman->deskripsi !!}</p>
            </div>
        </div>
    </div>
@endsection
