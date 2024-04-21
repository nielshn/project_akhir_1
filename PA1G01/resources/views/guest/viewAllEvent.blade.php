@extends('layouts.frontend.main')
@section('title')
    All Event Satuan Pengawas Internal - IT DEL
@endsection
@section('content')
    <div class="row g-5">
        <!-- Blog Start -->
        <div class="col-md-11">
            <div class="row g-5">
                <!-- Article Section Start -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-9">
                            <h4 class="widgettitle" style="margin-bottom: 1.5em">EVENT</h4>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3 wow slideInUp" data-wow-delay="0.1s">
                                <div class="input-group">
                                    <input type="text" id="searchInput" class="form-control p-1" placeholder="Search">
                                    <button class="btn btn-primary px-2"><i class="bi bi-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($event as $row)
                            <div class="col-md-4 mb-5 cardColumn">
                                <div class="blog-item bg-light rounded overflow-hidden">
                                    <div class="blog-img position-relative overflow-hidden">
                                        @if (file_exists(public_path('uploads/event/' . $row->gambar_event)))
                                            @php
                                                $resizedImage = Image::make(public_path('uploads/event/' . $row->gambar_event))->fit(600, 400);
                                            @endphp
                                            <img class="img-fluid" src="{{ $resizedImage->encode('data-url') }}">
                                        @else
                                            <div class="image-not-found">
                                                <p class="text-danger">Gambar tidak ditemukan</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex mb-3">
                                            <small class="me-3">
                                                @foreach ($user as $p)
                                                    <i class="far fa-user text-primary me-2"></i>{{ $p->name }}
                                                @endforeach
                                            </small>
                                            <small>
                                                <i class="far fa-calendar-alt text-primary me-2"></i>
                                                @if ($row->created_at == null)
                                                    <span class="text-danger">{{ __('Tidak ada tanggal') }}</span>
                                                @else
                                                    {{ Carbon\Carbon::parse($row->created_at)->format(' F d, Y') }}
                                                @endif
                                            </small>
                                        </div>
                                        <?php
                                        $bodyWords = str_word_count(strip_tags($row->judul), 1);
                                        $shortBody = implode(' ', array_slice($bodyWords, 0, 4));
                                        ?>
                                        <h6 class="mb-2 border-l-4">{{ $shortBody }}...</h6>
                                        <?php
                                        $bodyWords = str_word_count(strip_tags($row->body), 1);
                                        $shortBody = implode(' ', array_slice($bodyWords, 0, 10));
                                        ?>
                                        <p>{!! $shortBody !!}...</p>
                                        <a style="font-size: 0.8rem"
                                            href="{{ route('detailEvent', [$row->id, $row->slug]) }}">READ MORE <i
                                                class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12">
                            {{ $event->links() }}
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="categoryDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            View All
                        </button>
                        <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                            <a class="dropdown-item" href="{{ route('allArtikel') }}">Artikel</a>
                            <a class="dropdown-item" href="{{ route('allEvent') }}">Kegiatan</a>
                            <a class="dropdown-item" href="{{ route('allNews') }}">Berita</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css" media="all">
        /* Style untuk card event */
        .blog-item {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Tambahkan border radius pada setiap sudut */
        .blog-item::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 15px;
            z-index: -1;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .blog-item:hover {
            transform: translateY(-5px);
            box-shadow: 0px 12px 25px rgba(0, 0, 0, 0.2);
        }

        /* Style untuk gambar di dalam card */
        .blog-item .blog-img img {
            transition: transform 0.3s ease;
        }

        .blog-item:hover .blog-img img {
            transform: scale(1.05);
        }

        /* Style untuk teks di dalam card */
        .blog-item .p-4 {
            position: relative;
            background-color: rgba(255, 255, 255, 0.9);
            transition: background-color 0.3s ease;
        }

        .blog-item:hover .p-4 {
            background-color: rgba(255, 255, 255, 0.95);
        }

        /* Efek 3 dimensi */
        .blog-item::before {
            transform: rotateY(45deg) translateX(-50%);
            background: rgba(255, 255, 255, 0.2);
        }

        /* Efek 3 dimensi saat hover */
        .blog-item:hover::before {
            transform: rotateY(45deg) translateX(-50%) scale(1.1);
            background: rgba(255, 255, 255, 0.4);
        }

        /* Efek 3 dimensi untuk gambar */
        .blog-item .blog-img::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transform: rotateY(45deg) translateX(-50%);
            transition: transform 0.3s ease;
            z-index: -1;
        }

        /* Efek 3 dimensi untuk gambar saat hover */
        .blog-item:hover .blog-img::after {
            transform: rotateY(45deg) translateX(-50%) scale(1.1);
            background: rgba(255, 255, 255, 0.4);
        }

        /* Efek 3 dimensi untuk teks */
        .blog-item .p-4::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transform: rotateY(45deg) translateX(-50%);
            transition: transform 0.3s ease;
            z-index: -1;
        }

        /* Efek 3 dimensi untuk teks saat hover */
        .blog-item:hover .p-4::after {
            transform: rotateY(45deg) translateX(-50%) scale(1.1);
            background: rgba(255, 255, 255, 0.4);
        }


        .image-not-found {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 200px;
            /* Sesuaikan dengan tinggi gambar yang diharapkan */
            background-color: #f8d7da;
            /* Warna latar belakang yang sesuai */
            border: 2px dashed #dc3545;
            /* Garis putus-putus merah */
        }

        .image-not-found p {
            margin: 0;
            font-size: 16px;
            color: #dc3545;
            /* Warna teks merah yang sesuai */
            font-weight: bold;
        }
    </style>
@endsection
@push('scripts')
    <!-- JAVASCRIPT FILES -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                var $cardColumns = $('.cardColumn');

                $cardColumns.each(function() {
                    var cardText = $(this).text().toLowerCase();
                    if (cardText.indexOf(value) > -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                if ($cardColumns.filter(':visible').length === 0) {
                    $('.no-results').show();
                } else {
                    $('.no-results').hide();
                }
            });

            $('#categoryFilter').on('change', function() {
                var selectedCategory = $(this).val();
                var $cardColumns = $('.cardColumn');

                $cardColumns.each(function() {
                    var cardCategory = $(this).data('category').toLowerCase();
                    if (selectedCategory === 'all' || cardCategory === selectedCategory
                        .toLowerCase()) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                if ($cardColumns.filter(':visible').length === 0) {
                    $('.no-results').show();
                } else {
                    $('.no-results').hide();
                }
            });

            if ($('.cardColumn').length === 0) {
                $('.no-results').show();
            }
        });
    </script>
@endpush
