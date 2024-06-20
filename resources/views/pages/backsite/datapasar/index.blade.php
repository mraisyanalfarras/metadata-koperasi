@extends('layout.master')

@section('title', 'Data Pasar')

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
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 align-middle mb-0">Data Pasar</h1>
                        <a href="{{ route('datapasar.create') }}" class="btn btn-primary" style="padding: 12px 12px;">Tambah Data</a>
                    </div>

                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>                       
                                <th>Nama Pasar</th>
                                <th>Foto</th>
                                <th>Kecamatan</th>
                                <th>Alamat</th>
                                <th>Jumlah Kios</th>
                                <th width="25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datapasar as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->namapasar }}</td>
                                    <td>
                                        @if ($item->foto)
                                            <img src="{{ asset('storage/foto_pasar/' . $item->foto) }}" alt="Foto" width="150">
                                        @else
                                            No Image
                                        @endif
                                    </td>                                    
                                    <td>{{ optional($item->kecamatan)->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->jumlah_kios }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('datapasar.show', $item->id) }}" class="btn btn-success btn-sm action-button">Lihat</a>
                                            <a href="{{ route('datapasar.edit', $item->id) }}" class="btn btn-warning btn-sm action-button">Edit</a>
                                            <form id="deleteForm{{ $item->id }}" action="{{ route('datapasar.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm action-button" onclick="confirmDelete('{{ $item->id }}')">Delete</button>
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
