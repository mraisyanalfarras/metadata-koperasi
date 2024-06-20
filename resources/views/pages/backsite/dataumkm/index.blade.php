@extends('layout.master')

@section('title', 'Data UMKM')

@section('content')

<style>
    .action-button {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 38px; /* Adjust height to match button height */
        margin: 0 5px;
        padding: 6px 12px; /* Ensures padding is consistent for all buttons */
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-body">

            <div class="d-flex align-items-center justify-content-between mb-3">
                <h1 class="h4 align-middle mb-0">Data UMKM</h1>
                <a href="{{ route('dataumkm.create') }}" class="btn btn-primary action-button">Tambah Data</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama UMKM</th>
                            <th>Alamat</th>
                            <th>Kategori</th>
                            <th>Foto</th>
                            <th>Pemilik</th>
                            <th>No. Telp</th>
                            <th>Email</th>
                            <th>Tanggal Berdiri</th>
                            <th width="30%">
                                <center>Aksi</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataumkm as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_umkm }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ optional($item->kategoriumkm)->nama }}</td>
                                <td>
                                    @if ($item->foto)
                                        <img src="{{ asset('storage/foto_umkm/' . $item->foto) }}" alt="Foto" width="150">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>{{ $item->pemilik }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->tgl_berdiri }}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="{{ route('dataumkm.show', $item->id) }}" class="btn btn-success btn-sm action-button" title="Lihat">
                                            <i class="fa fa-eye"></i> Lihat
                                        </a>
                                        <a href="{{ route('dataumkm.edit', $item->id) }}" class="btn btn-warning btn-sm action-button" title="Edit">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form id="deleteForm{{ $item->id }}" action="{{ route('dataumkm.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm mt-3 action-button" title="Delete" onclick="confirmDelete('{{ $item->id }}')">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
