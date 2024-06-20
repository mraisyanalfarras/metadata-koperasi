@extends('layout.master')

@section('title', 'Pengajuan Surat')

@section('content')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 align-middle mb-0">Detail Pengajuan Surat</h1>
                    </div>

                    <ul>
                        <li class="mb-2"><strong style="display: inline-block; width: 100px;">NIK</strong> :
                            {{ $pengajuan->nik }}</li>
                        <li class="mb-2"><strong style="display: inline-block; width: 100px;">Nama</strong> :
                            {{ $pengajuan->nama }}</li>
                        <li class="mb-2"><strong style="display: inline-block; width: 100px;">Email</strong> :
                            {{ $pengajuan->email }}</li>
                        <li class="mb-2"><strong style="display: inline-block; width: 100px;">Tanggal</strong> :
                            {{ $pengajuan->tanggal }}</li>

                        <li class="mb-2"><strong style="display: inline-block; width: 100px;">Jenis Surat:</strong>
                            : {{ optional($pengajuan->jenisSurat)->nama_surat }}</li>

                            <li class="mb-2">
                                <div class="ktp-wrapper">
                                    <strong style="display: inline-block; width: 100px;">KTP</strong>
                                    <div class="ktp-image">
                                        <a href="{{ asset('/storage/ktp/' . $pengajuan->ktp) }}" download>
                                            <img src="{{ asset('/storage/ktp/' . $pengajuan->ktp) }}" alt="ktp" width="500">
                                        </a>
                                    </div>
                                </div>
                            </li>
                            
                        <li class="mb-2">
                            <div class="kk-wrapper">
                                <strong style="display: inline-block; width: 100px;">KK</strong>
                                <div class="kk-image">
                                    <a href="{{ asset('/storage/kk/' . $pengajuan->kk) }}" download>
                                        <img src="{{ asset('/storage/kk/' . $pengajuan->kk) }}" alt="kk" width="500">
                                    </a>
                                </div>
                            </div>
                        </li>

                        {{-- <li class="mb-2"><strong>KK:</strong> {{ $pengajuan->pesan }}</li> --}}
                        <li class="mb-2"><strong style="display: inline-block; width: 100px;">No HP</strong> :
                            {{ $pengajuan->no_hp }}</li>
                    </ul>

                    <a href="{{ route('kontak.index') }}" class="btn btn-light">Kembali</a>


                </div>

            </div>
        </div>
    </div>
@endsection
