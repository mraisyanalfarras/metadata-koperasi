@extends('layout.master')

@section('title', 'Data UMKM')

@section('content')

   <div class="container">
    <h1>Create Data UMKM</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dataumkm.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_umkm" class="form-label">Nama UMKM</label>
            <input type="text" class="form-control" id="nama_umkm" name="nama_umkm" value="{{ old('nama_umkm') }}" required>
        </div>
        
        <div class="mb-3">
            <label for="id_kategoriumkm" class="form-label">Kategori UMKM</label>
            <select class="form-control" id="id_kategoriumkm" name="id_kategoriumkm">
                <option value="">Pilih Kategori</option>
                @foreach($kategoriumkm as $kat)
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

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="pemilik" class="form-label">Pemilik</label>
            <input type="text" class="form-control" id="pemilik" name="pemilik" value="{{ old('pemilik') }}" required>
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label">No. Telp</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="tgl_berdiri" class="form-label">Tanggal Berdiri</label>
            <input type="date" class="form-control" id="tgl_berdiri" name="tgl_berdiri" value="{{ old('tgl_berdiri') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection