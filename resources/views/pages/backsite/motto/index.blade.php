@extends('layout.master')

@section('title', 'Motto')

@section('content')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 align-middle mb-0">Data Motto</h1>
                    
                        @if(session('success'))
                        <div class="alert btn btn-info mb-0">
                            <i class="icon fa fa-check"></i> {{ session('success') }}
                        </div>
                        @endif
                    </div>

                    <form method="POST" class="form-setting" action="{{ route('motto.update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Judul</label>
                            <input name="judul" id="judul" type="text" class="form-control">
                        </div>

                        <div class="card-body">
                            <label for="deskripsivisi" style="margin-bottom: 1px;">Deskripsi</label>
                            <textarea id="summernote" name="deskripsi" class="form-control" cols="30" rows="10" required></textarea>
                        </div>

                        <div class="mb-0">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection

@push('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>    
<script>
    $(document).ready(function() {
        $("#summernote").summernote();
        $('.dropdown-toggle').dropdown();
    });
</script>
@endpush


@push('scripts')
    <script>
        $(function () {
            showData();
            $('.form-setting').validator().on('submit', function () {
                if(! e.preventDefault()) {
                    $.ajax({
                        url: $('.form-setting').attr('action'),
                        type: $('.form-setting').attr('method'),
                        data: new FormData($('.form-setting')[0]),
                        async: false,
                        processData: false,
                        contentType: false
                    })
                    .done(response => {
                        showData();
                        $('.alert').fadeOut();
                    })
                    .fail(errors => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });
                }
            });
        });

        function showData() {
            $.get('{{ route('motto.show') }}')
                .done(response => {
                    $('[name=judul]').val(response.judul);
                    $('#summernote').summernote('code', response.deskripsi);
                })
                .fail(errors => {
                    alert('Tidak dapat menampilkan data');
                    return;
                })
        }
    </script>

    <script>
        $(document).ready(function(){
        // Menyembunyikan alert setelah beberapa detik
        setTimeout(function(){
            $('.alert').fadeOut();
        }, 1000);
        });
    </script>
@endpush

