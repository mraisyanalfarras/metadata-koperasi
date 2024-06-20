@extends('layout.master')

@section('title', 'Kategori Koperasi')

@section('content')
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h1 class="h3 align-middle mb-0">Tambah Data Kategori Koperasi</h1>

                </div>

                <form method="POST" class="form-setting" action="{{ route('kategorikoperasi.store') }}">
                    @csrf
@csrf
                    <div class="card-body">
                        <label for="nama">Nama Kategori:</label>
                        <input type="text" name="nama" id="nama"  class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('kategorikoperasi.index') }}" class="btn btn-light">Cancel</a>

                </form>

            </div>

        </div>
    </div>
</div>
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ Session::get('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    });
</script>


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