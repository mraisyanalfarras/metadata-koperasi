@extends('layout.master')

@section('title', 'Identitas')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 align-middle mb-0">Data Identitas</h1>

                        @if (session('success'))
                            <div class="alert btn btn-info mb-0">
                                <i class="icon fa fa-check"></i> {{ session('success') }}
                            </div>
                        @endif
                    </div>

                    <form method="POST" class="form-setting" action="{{ route('identitas.update') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Nama Desa</label>
                            <input name="nama_desa" id="nama_desa" type="text" class="form-control">
                        </div>

                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Hari Kerja</label>
                            <input name="hari_kerja" id="hari_kerja" type="text" class="form-control">
                        </div>

                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Jam Kerja</label>
                            <input name="jam_kerja" id="jam_kerja" type="text" class="form-control">
                        </div>

                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Nomor Telepon</label>
                            <input name="no_hp" id="no_hp" type="text" class="form-control">
                        </div>

                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Email</label>
                            <input name="email" id="email" type="email" class="form-control">
                        </div>

                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Facebook</label>
                            <input name="link_fb" id="link_fb" type="url" class="form-control">
                        </div>

                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Twitter</label>
                            <input name="link_twit" id="link_twit" type="url" class="form-control">
                        </div>

                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Instagram</label>
                            <input name="link_ig" id="link_ig" type="url" class="form-control">
                        </div>

                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Logo</label>
                            <input name="logo" id="logo" type="file" class="form-control"
                                onchange="preview('.tampil-foto', this.files[0], 300)">
                            <br>
                            <div class="tampil-foto"></div>
                        </div>

                        <div class="card-body">
                            <label for="judulvisi" style="margin-bottom: 1px;">Maps</label>
                            <input name="maps" id="maps" type="url" class="form-control">
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
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="{{ asset('assets/backsite/vendors/summernote/summernote.min.css') }}" rel="stylesheet">
@endpush

@push('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
            $.get('{{ route('identitas.show') }}')
                .done(response => {
                    $('[name=nama_desa]').val(response.nama_desa);
                    $('[name=hari_kerja]').val(response.hari_kerja);
                    $('[name=jam_kerja]').val(response.jam_kerja);
                    $('[name=no_hp]').val(response.no_hp);
                    $('[name=email]').val(response.email);
                    $('[name=link_fb]').val(response.link_fb);
                    $('[name=link_twit]').val(response.link_twit);
                    $('[name=link_ig]').val(response.link_ig);
                    $('.tampil-foto').html(`<img src="{{ url('/') }}${response.logo}" width="200">`);
                    $('[name=maps]').val(response.maps);
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
