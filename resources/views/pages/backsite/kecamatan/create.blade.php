@extends('layout.master')

@section('title', 'Kecamatan')

@section('content')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 align-middle mb-0">Tambah Data Kecamtan</h1>

                    </div>

                    <form method="POST" class="form-setting" action="{{ route('kecamatan.store') }}">
                        @csrf
@csrf
                        <div class="card-body">
                            <label for="nama">Nama Kecamatan:</label>
                            <input type="text" name="nama" id="nama"  class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('kecamatan.index') }}" class="btn btn-light">Cancel</a>

                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection

@push('style')
<!-- Anda mungkin tidak membutuhkan stylesheet Summernote di sini -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('script')
<!-- Pastikan Anda hanya memuat script yang benar-benar diperlukan -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- Anda mungkin tidak membutuhkan Summernote di sini -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>    
<!-- Jika Anda menggunakan Summernote, pastikan Anda menginisialisasinya dengan benar -->
<script>
    $(document).ready(function() {
        // $("#summernote").summernote();
        $('.dropdown-toggle').dropdown();
    });
</script>
@endpush
