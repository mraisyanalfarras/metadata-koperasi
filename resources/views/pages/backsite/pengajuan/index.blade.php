@extends('layout.master')

@section('title', 'Pengajuan Surat')

@section('content')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 align-middle mb-0">Data Pengajuan Surat</h1>
                    </div>

                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>                        
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                {{-- <th>Jenis Surat</th>
                                <th>KTP</th>
                                <th>KK</th>
                                <th>No HP</th> --}}
                                <th width="30%">
                                    <center>Aksi</center>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengajuan as $item)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $item->nik }} </td>
                                    <td> {{ $item->nama }} </td>
                                    <td> {{ $item->email }} </td>
                                    <td> {{ $item->tanggal }} </td>
                                    {{-- <td> {{ optional($item->jenis_surats)->nama_surat}} </td>
                                    <td>
                                        @if ($item->ktp)
                                            <img src="{{ asset('/storage/ktp/' . $item->ktp) }}" alt="ktp"
                                                width="50">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->kk)
                                            <img src="{{ asset('/storage/kk/' . $item->kk) }}" alt="kk"
                                                width="50">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td> {{ $item->no_hp }} </td> --}}
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('pengajuan.show', $item->id) }}" class="btn btn-success btn-sm mr-2 mt-1" style="margin-top: 10px;">Lihat</a>
                                            </div>
                                            <form id="deleteForm{{ $item->id }}" action="{{ route('pengajuan.destroy', $item->id) }}" method="POST" style="display: inline; margin-left: 10px;">
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
