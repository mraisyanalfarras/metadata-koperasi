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
                        <a href="{{ route('datapasar.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="nama_umkm" class="form-label">Nama UMKM:</label>
                        </div>
                        <div class="col-md-8">
                            <p id="namapasar">{{ $datapasar->namapasar }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="alamat" class="form-label">Alamat:</label>
                        </div>
                        <div class="col-md-8">
                            <p id="alamat">{{ $datapasar->alamat }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="kecamatan" class="form-label">Kecamatan:</label>
                        </div>
                        <div class="col-md-8">
                            <p id="kecamatan">{{ optional($datapasar->kecamatan)->nama }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="jumlah_kios" class="form-label">Jumlah Kios:</label>
                        </div>
                        <div class="col-md-8">
                            <p id="jumlah_kios">{{ $datapasar->jumlah_kios }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="foto" class="form-label">Foto:</label>
                            <li class="mb-2">
                                <div class="foto-wrapper">
                                    <strong style="display: inline-block; width: 100px;">foto</strong>
                                    <div class="foto-image">
                                        <a href="{{ asset('/storage/foto_pasar/' . $datapasar->foto) }}" download>
                                            <img src="{{ asset('/storage/foto_pasar/' . $datapasar->foto) }}" alt="foto" width="500">
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
