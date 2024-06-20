@extends('layout.master')

@section('title', 'Jenis Surat')

@section('content')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 align-middle mb-0">Tambah Data Jenis Surat</h1>

                    </div>

                    <form method="POST" class="form-setting" action="{{ route('jenis-surat.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Kode Surat</label>
                            <input name="kode_surat" id="kode_surat" type="text" class="form-control @error('kode_surat') is-invalid @enderror" value="{{old('kode_surat')}}">
                            @error('kode_surat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Jenis Surat</label>
                            <input name="nama_surat" id="nama_surat" type="text" class="form-control @error('nama_surat') is-invalid @enderror" value="{{old('nama_surat')}}">
                            @error('nama_surat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('jenis-surat.index') }}" class="btn btn-light">Cancel</a>

                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection

@push('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>    
<script>
    $(document).ready(function() {
        $("#summernote").summernote();
        $('.dropdown-toggle').dropdown();
    });
</script>
@endpush