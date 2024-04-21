{{-- @extends('layouts.frontend.main')
@section('title')
    Kontak Satuan Pengawas Internal - IT DEL
@endsection
@section('content')
    <!-- Contact Start -->
    <div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-2">
            <div class="text-center position-relative pb-5 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Contact Us</h5>
                <h3 class="mb-0">Jika Anda Memiliki Pertanyaan, Jangan Ragu Untuk Menghubungi Kami</h3>
            </div>
            <div class="d-flex " style="justify-content: space-evenly;">
                <div class="col-lg-6">
                    <div class="col-lg-7 mb-5">
                        <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                            <div class="bg-primary d-flex align-items-center justify-content-center rounded me-3"
                                style="width: 60px; height:60px;">
                                <i class="fa fa-phone-alt text-white" style="font-size:1.7em;"></i>
                            </div>
                            <div class="ps-2">
                                <h5 class="mb-2">Call to ask any question</h5>
                                <h6 class="text-primary mb-0">+62 632 331234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 mb-5">
                        <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                            <div class="bg-primary d-flex align-items-center justify-content-center rounded me-3"
                                style="width: 60px; height:60px;">
                                <i class="fa fa-envelope-open text-white" style="font-size: 1.7em;"></i>
                            </div>
                            <div class="ps-2">
                                <h5 class="mb-2">Visit Our Website</h5>
                                <a href="http://www.del.ac.id">http://www.del.ac.id</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-5">
                        <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                            <div class="bg-primary d-flex align-items-center justify-content-center rounded me-3"
                                style="width: 60px; height:60px;">
                                <i class="fa fa-map-marker-alt text-white" style="font-size: 1.7em;"></i>
                            </div>
                            <div class="ps-2">
                                <h5 class="mb-2">Visit our office</h5>
                                <p class="text-primary mb-0">Jl. Sisingamangaraja, Sitoluama Laguboti, Toba Samosir
                                    Sumatera Utara, Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    <iframe class="position-relative rounded w-160 h-200"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.36733022699!2d99.14605251085332!3d2.3832205573726046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e00fdad2d7341%3A0xf59ef99c591fe451!2sDel%20Institute%20of%20Technology!5e0!3m2!1sen!2sid!4v1683173120209!5m2!1sen!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection --}}

@extends('layouts.frontend.main')
@section('title', 'Kontak Satuan Pengawas Internal - IT DEL')
@section('content')
    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-2">
            <div class="text-center mb-5">
                <h5 class="fw-bold text-primary text-uppercase">Hubungi Kami</h5>
                <h3 class="mb-0">Jika Anda Memiliki Pertanyaan, Jangan Ragu Untuk Menghubungi Kami</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 mb-4">
                    <div class="card shadow-sm bg-light p-4 text-center h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <div class="icon bg-primary text-white rounded-circle mb-3">
                                <i class="fa fa-phone-alt" style="font-size: 2em;"></i>
                            </div>
                            <h5 class="card-title fw-bold mb-2">Telepon</h5>
                            <p class="card-text text-secondary">Tanyakan pertanyaan Anda melalui telepon</p>
                            <a href="tel:+62632331234" class="btn btn-primary btn-sm">+62 632 331234</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card shadow-sm bg-light p-4 text-center h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <div class="icon bg-primary text-white rounded-circle mb-3">
                                <i class="fa fa-envelope-open" style="font-size: 2em;"></i>
                            </div>
                            <h5 class="card-title fw-bold mb-2">Situs Web</h5>
                            <p class="card-text text-secondary">Kunjungi situs web kami untuk informasi lebih lanjut</p>
                            <a href="http://www.del.ac.id" target="_blank" class="btn btn-primary btn-sm">Kunjungi Situs
                                Web</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card shadow-sm bg-light p-4 text-center h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <div class="icon bg-primary text-white rounded-circle mb-3">
                                <i class="fa fa-map-marker-alt" style="font-size: 2em;"></i>
                            </div>
                            <h5 class="card-title fw-bold mb-2">Kantor Kami</h5>
                            <p class="card-text text-secondary">Kunjungi kantor kami di lokasi berikut</p>
                            <p class="card-text text-primary mb-0">Jl. Sisingamangaraja, Sitoluama Laguboti, Toba Samosir
                                Sumatera Utara, Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body p-0">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.36733022699!2d99.14605251085332!3d2.3832205573726046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e00fdad2d7341%3A0xf59ef99c591fe451!2sDel%20Institute%20of%20Technology!5e0!3m2!1sen!2sid!4v1683173120209!5m2!1sen!2sid"
                                width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
