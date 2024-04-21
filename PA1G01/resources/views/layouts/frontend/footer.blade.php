<footer class="bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column align-items-start justify-content-center text-center h-100 bg-dark p-0">
                    <img src="{{ asset('logo.jpg') }}" class="img-fluid mb-3" alt="Logo" width="190">
                    <h6 style="font-size: 0.78em; margin-top: -5px;" class="text-white">SATUAN PENGAWAS INTERNAL <br> INSTITUT TEKNOLOGI DEL</h6>
                </div>
            </div>
            <div class="col-lg-9 col-md-6">
                <div class="row gx-5">
                    <div class="col-lg-3 col-md-6 pt-5 mb-5">
                        <div class="position-relative pb-3 mb-4">
                            <h6 class="text-light mb-0">Alamat</h6>
                        </div>
                        <div class="d-flex 4mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0">Jl. Sisingamangaraja, Sitoluama Laguboti, Toba Samosir Sumatera Utara,
                                Indonesia</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 pt-5 mb-5">
                        <div class="position-relative pb-3 mb-4">
                            <h6 class="text-light mb-0">Further Info</h6>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-primary me-2"></i>
                            <a href="http://www.del.ac.id" class="mb-0">del.ac.id</a>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">+62 632 331234</p>
                        </div>
                        <div class="d-flex mt-4">
                            <a class="btn btn-primary btn-square me-2" href="https://twitter.com/institut_del"><i
                                    class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-primary btn-square me-2"
                                href="https://www.facebook.com/pages/Institut-Teknologi-Del/1577012755905352"><i
                                    class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-primary btn-square me-2"
                                href="https://www.linkedin.com/school/institut-teknologi-del/"><i
                                    class="fab fa-linkedin-in fw-normal"></i></a>
                            <a class="btn btn-primary btn-square me-2" href=" https://www.instagram.com/it.del/"><i
                                    class="fab fa-instagram fw-normal"></i></a>
                            {{-- <a class="btn btn-primary btn-square" href="https://wa.me/6282283053173" target="_blank"
                                rel="noopener noreferrer">
                                <i class="fab fa-whatsapp fw-normal"></i> --}}
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 pt-5 mb-5">
                        <div class="position-relative pb-3 mb-4">
                            <h6 class="text-light mb-0">Tautan</h6>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="text-light mb-2" href="{{ route('foto') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>GALERI</a>
                            <a class="text-light mb-2" href="{{ route('sejarah') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>SEJARAH</a>
                            <a class="text-light mb-2" href="{{ route('laporan.create') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>LAPOR SPI</a>
                            <a class="text-light mb-2" href="{{ route('announcement') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>PENGUMUMAN</a>
                            <a class="text-light mb-2" href="{{ route('download') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>FILE UNDUH</a>
                            <a class="text-light mb-2" href="{{ route('contact') }}"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>KONTAK</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 pt-5 mb-5">
                        <div class="position-relative pb-3 mb-4">
                            <h6 class="text-light mb-0">Lokasi</h6>
                        </div>
                        <div class="col-lg-12 wow slideInUp" data-wow-delay="0.6s">
                            <iframe class="position-relative rounded" style="width: 260px; height:210px"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.36733022699!2d99.14605251085332!3d2.3832205573726046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e00fdad2d7341%3A0xf59ef99c591fe451!2sDel%20Institute%20of%20Technology!5e0!3m2!1sen!2sid!4v1683173120209!5m2!1sen!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429; z-index:9999; position: relative;">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-9 col-md-6">
                    <div class="d-flex align-items-center" style="height: 75px;">
                        {{-- <div></div> --}}
                        <p class="mb-0 text-center">&copy; <a style="text-decoration: none;" class="text-white"
                                href="#">Institut Teknologi Del</a>. All Rights Reserved. Designed by <a
                                style="text-decoration: none;" class="text-white" href="https://www.del.ac.id/">IT
                                DEL</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top" style="z-index: 99999;"><i
        class="bi bi-arrow-up"></i></a>
<a style="font-size: 2.6em" href="https://api.whatsapp.com/send/?phone=%2B6282283053173" target="_blank"
    class="whatsapp_float"><i class="fab fa-whatsapp"></i></a>
<style>
    .whatsapp_float {
        position: fixed;
        bottom: 20px;
        left: 20px;
        z-index: 99999;
        width: 50px;
        height: 50px;
        background-color: transparent;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        transition: background-color 0.3s ease;
    }

    .whatsapp_float:hover {
        background-color: #25d366;
        color: #fff;
    }
</style>
