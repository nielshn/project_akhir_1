<!-- Navbar Start -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
        <a href="#" class="navbar-brand p-0">
            <h4 class="m-0">SATUAN PENGAWAS INTERNAL</h4>
            <h4 class="m-0">INSTITUT TEKNOLOGI DEL</h4>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('guest') }}" class="nav-item nav-link">BERANDA</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">PROFIL</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('sejarah') }}" class="dropdown-item">SEJARAH</a>
                        <a href="{{ route('visiMisi') }}" class="dropdown-item">VISI &
                            MISI</a>
                        <a href="{{ route('ruang.lingkup') }}" class="dropdown-item">SASARAN
                            DAN RUANG LINGKUP</a>
                        <a href="{{ route('tanggung.jawab') }}" class="dropdown-item">TANGGUNG JAWAB DAN
                            WEWENANG</a>
                        <a href="{{ route('tugas.fungsi') }}" class="dropdown-item">TUGAS DAN
                            FUNGSI</a>
                        <a href="{{ route('struktur') }}" class="dropdown-item">STRUKTUR
                            ORGANISASI</a>
                        <a href="{{ route('personil') }}" class="dropdown-item">PERSONIL</a>
                        <a href="{{ route('question') }}" class="dropdown-item">FAQ</a>
                    </div>
                    <style>
                        .dropdown-menu {
                            background: rgba(7, 38, 71, 0.91);
                        }

                        .dropdown-menu a {
                            color: #ffffff;
                        }

                        .dropdown-menu a:hover {
                            background-color: #073c64;
                            color: #ffffff;
                            border-color: #073c64;
                        }
                    </style>
                </div>
                <a href="{{ route('foto') }}" class="nav-item nav-link">GALERI</a>
                <a href="{{ route('laporan.create') }}" class="nav-item nav-link">LAPOR SPI</a>
                <a href="{{ route('announcement') }}" class="nav-item nav-link">PENGUMUMAN</a>
                <a href="{{ route('download') }}" class="nav-item nav-link">FILE UNDUH</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link ">KONTAK</a>
            </div>
            {{-- <button type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal">
                <i class="fa fa-search"></i>
            </button> --}}
        </div>


    </nav>

    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 0.5em;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            </div>
        </div>
    </div>
</div>

<!-- Full Screen Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
            <div class="modal-header border-0">
                <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="input-group" style="max-width: 600px;">
                    <input type="text" class="form-control bg-transparent border-primary p-3"
                        placeholder="Type search keyword">
                    <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Full Screen Search End -->
