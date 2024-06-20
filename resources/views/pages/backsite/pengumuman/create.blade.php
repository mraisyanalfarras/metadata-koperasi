@extends('layout.master')

@section('title', 'Pengumuman')

@section('content')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 align-middle mb-0">Tambah Data Pengumuman</h1>

                    </div>

                    <form method="POST" class="form-setting" action="{{ route('pengumuman.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Judul</label>
                            <input name="judul" id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" value="{{old('judul')}}">
                            @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="card-body">
                            <label for="deskripsivisi" style="margin-bottom: 1px;">Deskripsi</label>
                            <textarea id="summernote" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="10" required>{!! old('deskripsi') !!}</textarea>
                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('pengumuman.index') }}" class="btn btn-light">Cancel</a>

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