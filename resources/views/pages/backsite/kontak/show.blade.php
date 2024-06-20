@extends('layout.master')

@section('title', 'Kontak')

@section('content')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 align-middle mb-0">Detail Pesan</h1>
                    </div>

                    <ul>
                        <li class="mb-2"><strong>Nama Lengkap:</strong> {{ $kontak->nama_lengkap }}</li>
                        <li class="mb-2"><strong>Email:</strong> {{ $kontak->email }}</li>
                        <li class="mb-2"><strong>Subjek:</strong> {{ $kontak->subjek }}</li>
                        <li class="mb-2"><strong>Pesan:</strong> {{ $kontak->pesan }}</li>
                    </ul>
        
                    <a href="{{ route('kontak.index') }}" class="btn btn-light">Kembali</a>
                

                </div>

            </div>
        </div>
    </div>
@endsection
