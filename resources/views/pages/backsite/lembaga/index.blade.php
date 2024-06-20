@extends('layout.master')

@section('title', 'Lembaga')

@section('content')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 align-middle mb-0">Data Lembaga</h1>
                        <a href=" {{route('lembaga.create')}} " class="btn btn-primary" style="padding: 12px 12px;">Tambah Data</a>
                    </div>

                    <table class="table">
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
                            @foreach ($lembaga as $item)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $item->judul }} </td>
                                    <td class="biografi-column">{!! strip_tags($item->deskripsi) !!}</td>
                                    <td>
                                        @if ($item->foto)
                                            <img src="{{ asset('/storage/foto_lembaga/' . $item->foto) }}" alt="Foto"
                                                width="50">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="{{ route('lembaga.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                            <form id="deleteForm{{ $item->id }}" action="{{ route('lembaga.destroy', $item->id) }}" method="POST" style="display: inline; margin-left: 10px;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm mt-3" onclick="confirmDelete('{{ $item->id }}')">Delete</button>
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
