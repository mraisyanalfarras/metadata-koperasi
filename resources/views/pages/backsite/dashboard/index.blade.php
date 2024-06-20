@extends('layout.master')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-3"><strong>Dashboard</strong></h1>

    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Berita</h5>
                            <h1 class="mt-1 mb-3">{{ $berita }}</h1>
                            <a href="{{ route('berita.create') }}" class="btn btn-primary btn-block">Tambah Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Perangkat Desa</h5>
                            <h1 class="mt-1 mb-3">{{ $perangkat }}</h1>
                            <a href="{{ route('perangkat.create') }}" class="btn btn-primary btn-block">Tambah Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Pengumuman</h5>
                            <h1 class="mt-1 mb-3">{{ $pengumuman }}</h1>
                            <a href="{{ route('pengumuman.create') }}" class="btn btn-primary btn-block">Tambah Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Fasilitas</h5>
                            <h1 class="mt-1 mb-3">{{ $fasilitas }}</h1>
                            <a href="{{ route('fasilitas.create') }}" class="btn btn-primary btn-block">Tambah Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Potensi</h5>
                    <h1 class="mt-1 mb-3">{{ $potensi }}</h1>
                    <a href="{{ route('potensi.create') }}" class="btn btn-primary btn-block">Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Kontak</h5>
                    <h1 class="mt-1 mb-3">{{ $kontak }}</h1>
                    <a href="{{ route('kontak.index') }}" class="btn btn-primary btn-block">Lihat</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Data Pasar</h5>
                    <h1 class="mt-1 mb-3">{{ $datapasar }}</h1>
                    <a href="{{ route('datapasar.index') }}" class="btn btn-primary btn-block">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Data UMKM</h5>
                    <h1 class="mt-1 mb-3">{{ $dataumkm }}</h1>
                    <a href="{{ route('dataumkm.index') }}" class="btn btn-primary btn-block">Lihat</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Calendar</h5>
                </div>
                <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                        <div class="chart">
                            <div id="datetimepicker-dashboard"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
