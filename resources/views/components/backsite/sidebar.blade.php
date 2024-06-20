<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Dinas Koperasi</span>
        </a>

        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
            </a>
        </li>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                PROFIL DESA
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('identitas.index') }}">
                    <i class="align-middle" data-feather="info"></i> <span class="align-middle">Identitas Desa</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('sejarah.index') }}">
                    <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Sejarah</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('geografis.index') }}">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Geografis</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('visimisi.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Visi Misi</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('motto.index') }}">
                    <i class="align-middle" data-feather="star"></i> <span class="align-middle">Motto</span>
                </a>
            </li>

            <li class="sidebar-header">
                INFORMASI PUBLIK
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('datapasar.index') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Data Pasar</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('berita.index') }}">
                    <i class="align-middle" data-feather="save"></i> <span class="align-middle">Berita</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('kecamatan.index') }}">
                    <i class="align-middle" data-feather="save"></i> <span class="align-middle">Kecamatan</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('pengumuman.index') }}">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Pengumuman</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('kategoriumkm.index') }}">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Kategori UMKM</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('kategorikoperasi.index') }}">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Kategori Koperasi</span>
                </a>
            </li>
            
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('dataumkm.index') }}">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Data UMKM</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('koperasi.index') }}">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Data Koperasi</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('potensi.index') }}">
                    <i class="align-middle" data-feather="send"></i> <span class="align-middle">Potensi Desa</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('kontak.index') }}">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Kontak</span>
                </a>
            </li>
        </ul>

    </div>
</nav>
