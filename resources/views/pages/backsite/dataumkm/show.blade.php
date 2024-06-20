@extends('layout.master')

@section('title', 'Detail Data UMKM')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1 class="h4 mb-3">Detail Data UMKM</h1>

                    <div class="mb-3">
                        <a href="{{ route('dataumkm.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="nama_umkm" class="form-label">Nama UMKM:</label>
                        </div>
                        <div class="col-md-8">
                            <p id="nama_umkm">{{ $dataumkm->nama_umkm }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="alamat" class="form-label">Alamat:</label>
                        </div>
                        <div class="col-md-8">
                            <p id="alamat">{{ $dataumkm->alamat }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="kategori" class="form-label">Kategori:</label>
                        </div>
                        <div class="col-md-8">
                            <p id="kategori">{{ optional($dataumkm->kategoriumkm)->nama }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="pemilik" class="form-label">Pemilik:</label>
                        </div>
                        <div class="col-md-8">
                            <p id="pemilik">{{ $dataumkm->pemilik }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="no_telp" class="form-label">No. Telp:</label>
                        </div>
                        <div class="col-md-8">
                            <p id="no_telp">{{ $dataumkm->no_telp }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email:</label>
                        </div>
                        <div class="col-md-8">
                            <p id="email">{{ $dataumkm->email }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="tgl_berdiri" class="form-label">Tanggal Berdiri:</label>
                        </div>
                        <div class="col-md-8">
                            <p id="tgl_berdiri">{{ $dataumkm->tgl_berdiri }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="foto" class="form-label">Foto:</label>
                            <li class="mb-2">
                                <div class="foto-wrapper">
                                    <strong style="display: inline-block; width: 100px;">foto</strong>
                                    <div class="foto-image">
                                        <a href="{{ asset('/storage/foto_umkm/' . $dataumkm->foto) }}" download>
                                            <img src="{{ asset('/storage/foto_umkm/' . $dataumkm->foto) }}" alt="foto" width="500">
                                        </a>
                                    </div>
                                </div>
                            </li>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak dapat mengembalikan data yang telah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + id).submit();
            }
        });
    }
</script>
