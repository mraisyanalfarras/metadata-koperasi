@extends('layout.master')

@section('title', 'Perangkat')

@section('content')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 align-middle mb-0">Tambah Data Pasar</h1>
                    </div>

                    <form action="{{ route('datapasar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="namapasar">Nama Pasar:</label>
                            <input type="text" name="namapasar" class="form-control" id="namapasar">
                            @error('namapasar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_kecamatan">Kecamatan:</label>
                            <select name="id_kecamatan" class="form-control" id="id_kecamatan">
                                @foreach($kecamatan as $kec)
                                    <option value="{{ $kec->id }}">{{ $kec->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_kecamatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                            <label for="jumlah_kios">Jumlah Kios:</label>
                            <input type="number" name="jumlah_kios" class="form-control" id="jumlah_kios">
                            @error('jumlah_kios')
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
