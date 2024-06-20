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
                    <li class="breadcrumb-item text-white active" aria-current="page">Pengajuan Surat</li>
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
                        <h5 style="text-align: center; margin-top: 3px;">Silahkan Masukkan Data Diri Anda Pada Form Dibawah Ini Untuk Mengajukan Surat Pengajuan</h5>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="card">

                        <form method="POST" class="form-setting" action="{{ route('pengajuan-surat.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <label for="judulvisi" style="margin-bottom: 1px;">NIK</label>
                                <input name="nik" id="nik" type="text"
                                    class="form-control @error('nik') is-invalid @enderror"
                                    value="{{ old('nik') }}">
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="card-body">
                                <label for="judulvisi" style="margin-bottom: 1px;">Nama Lengkap</label>
                                <input name="nama" id="nama" type="text"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="card-body">
                                <label for="judulvisi" style="margin-bottom: 1px;">Email</label>
                                <input name="email" id="email" type="text"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="card-body">
                                <label for="judulvisi" style="margin-bottom: 1px;">Nomor Handphone</label>
                                <input name="no_hp" id="no_hp" type="text"
                                    class="form-control @error('no_hp') is-invalid @enderror"
                                    value="{{ old('no_hp') }}">
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="card-body">
                                <label for="judulvisi" style="margin-bottom: 1px;">Tanggal</label>
                                <input name="tanggal" id="datepicker" type="text"
                                    class="form-control @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal') }}">
                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="card-body">
                                <label for="judulvisi" style="margin-bottom: 1px;">Jenis Surat</label>
                                <select name="id_jenis_surats" id="id_jenis_surats" class="form-control @error('id_jenis_surats') is-invalid @enderror" >
                                    <option value="">~ Pilih Jenis Surat</option>
                                    @foreach ($jenisSurat as $item)
                                        <option value="{{ $item->id }}" {{ old('id_jenis_surats') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_surat }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_jenis_surats')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="card-body">
                                <label for="judulvisi" style="margin-bottom: 1px;">Foto KTP</label>
                                <input name="ktp" id="ktp" type="file" class="form-control" accept="image/*"
                                    onchange="preview('.tampil-ktp', this.files[0], 300)">
                                @error('ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small class="text-muted">Maximum file size: 2 MB</small>
                            </div>

                            <div class="card-body">
                                <label for="judulvisi" style="margin-bottom: 1px;">Foto Kartu Keluarga(KK)</label>
                                <input name="kk" id="kk" type="file" class="form-control" accept="image/*"
                                    onchange="preview('.tampil-kk', this.files[0], 300)">
                                @error('kk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small class="text-muted">Maximum file size: 2 MB</small>
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

@push('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
@endpush

@push('script')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
$( function() {
  $( "#datepicker" ).datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true,
  });
});
</script>
@endpush
