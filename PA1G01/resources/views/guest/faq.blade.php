@extends('layouts.frontend.main')
@section('title')
    FAQ Satuan Pengawas Internal Institut Teknologi Del
@endsection
@section('content')
    <!-- Contact Start -->
    <div class="container py-1 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row">
            <div class="col-md-8">
                <div class="container" style="margin-left:-3em">
                    <div class="text-center position-relative pb-2 mb-4 mx-auto" style="max-width: 600px;">
                        <h5 class="fw-bold text-primary text-uppercase">Frequently Asked Questions</h5>
                        <h5 class="fw-bold text-uppercase">Questions From</h5>
                    </div>
                    @foreach ($faq as $key)
                        <div class="accordion">
                            <div class="icon"></div>
                            <h5>{{ $key->pertanyaan }}</h5>
                        </div>
                        <div class="panel">
                            <p>
                                {!! $key->jawaban !!}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Sidebar Start -->
            <div class="col-md-4">
                <div id="sidebar">
                    <div id="rpwe_widget-2" class="et_pb_widget rpwe_widget recent-posts-extended">
                        <h2 style="font-size: 20px;" class="widgettitle mb-4">Kegiatan Terbaru</h2>
                        <div class="rpwe-block">
                            @foreach ($event as $row)
                                <ul class="rpwe-ul" style="margin-bottom: 1.2em">
                                    <li class="rpwe-li rpwe-clearfix">
                                        @if (file_exists(public_path('uploads/event/' . $row->gambar_event)))
                                            @php
                                                $resizedImage = Image::make(public_path('uploads/event/' . $row->gambar_event))->fit(120, 80);
                                            @endphp
                                            <img class="img-fluid" style="object-fit: cover;"
                                                src="{{ $resizedImage->encode('data-url') }}">
                                        @else
                                            <div class="image-not-found">
                                                <p class="text-danger">Gambar tidak ditemukan</p>
                                            </div>
                                        @endif
                                        <div class="rpwe-content">
                                            <?php
                                            $bodyWords = str_word_count(strip_tags($row->judul), 1);
                                            $shortBody = implode(' ', array_slice($bodyWords, 0, 6));
                                            ?>
                                            <p class="rpwe-title"><a
                                                    href="{{ route('detailEvent', [$row->id, $row->slug]) }}"
                                                    style="font-size: 1em;"
                                                    class="h6 fw-medium d-flex align-items-center px-3 mb-0 text-primary">{{ $shortBody }}...</a>
                                            </p>
                                            <small class="rpwe-time published text-center ps-3"
                                                datetime="2023-04-12T16:28:02+07:00"
                                                style="font-size: 12px;">{{ Carbon\Carbon::parse($row->created_at)->format(' F d, Y') }}</small>
                                        </div>
                                    </li>
                                    <hr style="border-top: 1px solid #ccc;">
                                    <!-- Add more recent posts here -->
                                </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="categoryDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            View All
                        </button>
                        <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                            <a class="dropdown-item" href="{{ route('allArtikel') }}/">Artikel</a>
                            <a class="dropdown-item" href="{{ route('allEvent') }}">Kegiatan</a>
                            <a class="dropdown-item" href="{{ route('allNews') }}">Berita</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css" media="all">
     .image-not-found {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 200px;
            background-color: #f8d7da;
            border: 2px dashed #dc3545;
        }

        .image-not-found p {
            margin: 0;
            font-size: 16px;
            color: #dc3545;
            /* Warna teks merah yang sesuai */
            font-weight: bold;
        }
        .rpwe-ul {
            list-style: none;
            padding: 0;
        }

        .rpwe-li {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .rpwe-li .rpwe-img {
            margin-right: 10px;
        }

        .rpwe-li .rpwe-title a {
            color: #000;
            font-weight: normal;
            text-decoration: none;
        }

        .widget_categories ul {
            list-style: none;
            padding: 0;
        }

        .widget_categories li {
            margin-bottom: 5px;
        }

        .feedzy-rss .rss_item .title a {
            font-weight: bold;
            color: #000;
            text-decoration: none;
        }

        .feedzy-rss .rss_item .rss_content p {
            margin-bottom: 0;
        }

        .feedzy-rss .rss_item hr {
            border: none;
            border-top: 1px solid #bbb8b8;
            margin: 10px 0;
        }

        .feedzy-rss .rss_item .title a {
            color: #00aaff;
        }

        .sidebar {
            float: right;
            width: 100%;
        }

        .sidebar-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-list li {
            margin-bottom: 20px;
        }
    </style>
@endsection
