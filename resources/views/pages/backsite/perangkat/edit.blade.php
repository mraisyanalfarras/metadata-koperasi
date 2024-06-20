@extends('layout.master')

@section('title', 'Perangkat')

@section('content')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 align-middle mb-0">Edit Data Perangkat Desa</h1>
                    </div>

                    <form method="POST" class="form-setting" action="{{ route('perangkat.update', $perangkat->id) }}"
                        enctype="multipart/form-data">
                        @csrf

                        @method('PUT')

                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Nama</label>
                            <input name="nama" id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $perangkat->nama) }}">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Jabatan</label>
                            <input name="jabatan" id="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan', $perangkat->jabatan) }}">
                            @error('jabatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Foto</label>
                            @if ($perangkat->foto)
                            <img src="{{ asset('/storage/foto_perangkat/'. $perangkat->foto) }}" class="img-thumbnail d-block" style="width: 10%; margin-top: 5px; margin-bottom: 5px;">
                            @else
                            <span class="badge custom-badge">Belum Ada Foto</span>
                            @endif
                            @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input name="foto" id="foto" type="file" class="form-control @error('foto') is-invalid @enderror">
                            <div>
                                <small class="text-muted">Maximum file size: 2 MB</small>
                            </div>
                            <input type="hidden" name="foto_lama" value="{{ $perangkat->foto }}">
                        </div>


                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('perangkat.index') }}" class="btn btn-light">Cancel</a>

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
