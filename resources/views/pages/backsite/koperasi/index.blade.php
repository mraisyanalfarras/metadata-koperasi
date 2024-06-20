@extends('layout.master')

@section('title', 'Koperasi')

@section('content')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 align-middle mb-0">Data Koperasi</h1>
                        <a href=" {{route('koperasi.create')}} " class="btn btn-primary" style="padding: 12px 12px;">Tambah Data</a>
                    </div>

                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>                       
                                <th>Nama Koperasi</th>
                                <th>Foto</th>
                                <th>Kategori</th>
                                <th>Alamat</th>
                                <th>Kecamatan</th>
                                <th width="25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($koperasi as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_koperasi }}</td>
                                    <td>
                                        @if ($item->foto)
                                            <img src="{{ asset('/storage/foto_koperasi/' . $item->foto) }}" alt="Foto" width="150">
                                        @else
                                            No Image
                                        @endif
                                    </td>                                    
                                    <td>{{ $item->kategorikoperasi->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->kecamatan }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('koperasi.show', $item->id) }}" class="btn btn-success btn-sm ml-2">Lihat</a>
                                            <a href="{{ route('koperasi.edit', $item->id) }}" class="btn btn-warning btn-sm ">Edit</a>
                                            <form id="deleteForm{{ $item->id }}" action="{{ route('koperasi.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $item->id }}')">Delete</button>
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
