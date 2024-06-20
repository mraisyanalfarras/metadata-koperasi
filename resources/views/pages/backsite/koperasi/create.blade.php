@extends('layout.master')

@section('title', 'Koperasi')

@section('content')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 align-middle mb-0">Tambah Data Koperasi</h1>
                    </div>

                    <form action="{{ route('koperasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_koperasi">Nama Koperasi:</label>
                            <input type="text" name="nama_koperasi" class="form-control" id="nama_koperasi">
                            @error('nama_koperasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="id_kategorikoperasi" class="form-label">Kategori UMKM</label>
                            <select class="form-control" id="id_kategorikoperasi" name="id_kategorikoperasi">
                                <option value="">Pilih Kategori</option>
                                @foreach($kategorikoperasi as $kat)
                                  <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto:</label>
                            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <small class="text-muted">Maximum file size: 2 MB</small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" name="alamat" class="form-control" id="alamat">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan:</label>
                            <input type="text" name="kecamatan" class="form-control" id="kecamatan">
                            @error('kecamatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')
<!-- Hapus script summernote karena tidak digunakan -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- Hapus script summernote karena tidak digunakan -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>    
<script>
    // Hapus script untuk summernote karena tidak digunakan
    $(document).ready(function() {
        // $("#summernote").summernote();
        $('.dropdown-toggle').dropdown();
    });
</script>
@endpush
