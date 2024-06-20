@extends('layout.master')

@section('title', 'Berita')

@section('content')

<style>
    .action-button {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 38px; /* Adjust height to match button height */
        margin: 0 5px;
    }
</style>

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 align-middle mb-0">Data Berita</h1>
                        <a href=" {{ route('berita.create') }} " class="btn btn-primary" style="padding: 12px 12px;">Tambah
                            Data</a>
                    </div>

                    <table id="myDataTable" class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th width="30%">
                                    <center>Aksi</center>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berita as $item)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $item->judul }} </td>
                                    <td class="biografi-column">{!! strip_tags($item->deskripsi) !!}</td>
                                    <td>
                                        @if ($item->foto)
                                            <img src="{{ asset('/storage/foto_berita/' . $item->foto) }}" alt="Foto"
                                                width="50">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="{{ route('berita.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm mr-2">Edit</a>
                                            <form id="deleteForm{{ $item->id }}"
                                                action="{{ route('berita.destroy', $item->id) }}" method="POST"
                                                style="display: inline; margin-left: 10px;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm mt-3"
                                                    onclick="confirmDelete('{{ $item->id }}')">Delete</button>
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

<link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">


<script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
<script>
    let table = new DataTable('#myDataTable');
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (Session::has('success'))
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
