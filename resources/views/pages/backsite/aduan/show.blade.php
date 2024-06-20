@extends('layout.master')

@section('title', 'Aduan Masyarakat')

@section('content')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 align-middle mb-0">Detail Pengaduan Masyarakat</h1>
                    </div>

                    <ul>
                        <li class="mb-2"><strong>Pesan:</strong> {{ $aduan->deskripsi }}</li>
                    </ul>
        
                    <a href="{{ route('aduan.index') }}" class="btn btn-light">Kembali</a>
                

                </div>

            </div>
        </div>
    </div>
@endsection
