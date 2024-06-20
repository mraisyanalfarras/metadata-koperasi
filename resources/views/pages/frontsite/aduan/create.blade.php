@extends('layout.main')

@section('title', 'Layanan Masyarakat')

@section('konten')

    <style>
        .alert-small {
            font-size: 1rem;
            /* Mengatur ukuran teks lebih kecil */
            padding: 5px 10px;
            /* Mengatur padding agar lebih sesuai dengan teks yang lebih kecil */
            margin-bottom: 10px;
            /* Opsional: Mengatur margin bawah */
            max-width: 300px;
            /* Mengecilkan lebar maksimum dari alert */
            display: block;
            /* Membuat alert menjadi block level element */
            margin-left: 200px;
            /* Dengan kombinasi margin-left dan margin-right auto, */
            margin-right: 300px;
            /* alert akan terpusat */
        }
    </style>


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Pengajuan Surat</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Pengaduan Masyarakat Desa</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container-xxl py-5">
        <div class="container">

            @if (session('success'))
                <div class="alert alert-success alert-small">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row justify-content-center">


                <div class="col-md-9 mb-3">
                    <div class="card" style="background-color: #ffff00">
                        <h5 style="text-align: center; margin-top: 3px;">Silahkan Masukkan Pengaduan Anda Terkait Desa</h5>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="card">

                        <form method="POST" class="form-setting" action="{{ route('aduan-masyarakat.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <label for="deskripsivisi" style="margin-bottom: 1px;">Deskripsi</label>
                                <textarea id="summernote" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30"
                                    rows="10" required>{!! old('deskripsi') !!}</textarea>
                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary mb-2 mr-3 ms-3">Submit</button>
                            {{-- <a href="{{ route('jenis-surat.index') }}" class="btn btn-light">Cancel</a> --}}

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
